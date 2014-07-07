<?php namespace HugoKalidas\FlexCms\Core;
use HugoKalidas\FlexCms\Core\Exceptions\NoValidationRulesFoundException;
use Validator, Eloquent, ReflectionClass, Input, Session;

/**
 * Base Eloquent Class Built On From Shawn McCool <-- This guy is pretty amazing
 */
class EloquentBaseModel extends Eloquent
{
    protected $validationRules = [];
    protected $validator;

    /**
     * show panes in edit view
     * @var bool
     */


    protected  $tabs = false;

    public function isValid( $data = array() )
    {
        if ( ! isset($this->validationRules) or empty($this->validationRules)) {
            throw new NoValidationRulesFoundException('no validation rules found in class ' . get_called_class());
        }

        if( !$data )
            $data = $this->getAttributes();

        $this->validator = Validator::make( $data , $this->getPreparedRules() );

        return $this->validator->passes();
    }

    public function getErrors()
    {
        return $this->validator->errors();
    }

    protected function getPreparedRules()
    {
        if ( ! $this->validationRules) {
            return [];
        }

        $preparedRules = $this->replaceIdsIfExists($this->validationRules);

        return $preparedRules;
    }

    protected function replaceIdsIfExists($rules)
    {
        $preparedRules = [];

        foreach ($rules as $key => $rule) {
            if (false !== strpos($rule, "<id>")) {
                if ($this->exists) {
                    $rule = str_replace("<id>", $this->getAttribute($this->primaryKey), $rule);
                } else {
                    $rule = str_replace("<id>", "", $rule);
                }
            }

            $preparedRules[$key] = $rule;
        }

        return $preparedRules;
    }

    /**
     * Hydrate the model with more stuff and
     * @return this
     */
    public function hydrateRelations()
    {
        if( $this->isTaggable() ) {
            Session::put('tags',"true");
            $this->saveTags();
        }
        if( $this->isClassable() ) {
            Session::put('classes',"true");
            $this->saveClasses();
        }
        if( $this->isUploadable() ) {
            Session::put('ups',"true");
            $this->deleteImagery( Input::get('deleteImage') );
        }
        return $this;
    }

    /**
     * Delete method overrid
     * @return void
     */
    public function delete()
    {
        if( $this->isTaggable() )
            $this->saveTags('');

        if( $this->isUploadable() )
            $this->deleteAllImagery();

        if( $this->isClassable() )
            $this->deleteClasses();

        return parent::delete();
    }

    /**
     * Figure out if tags can be used on the model
     * @return boolean
     */
    public function isTaggable()
    {
        return in_array( 'HugoKalidas\FlexCms\Abstracts\Traits\TaggableRelationship' , ( new ReflectionClass( $this ) )->getTraitNames() );
    }

    /**
     * Figure out if you can upload stuff here
     * @return boolean
     */
    public function isUploadable()
    {
        return in_array( 'HugoKalidas\FlexCms\Abstracts\Traits\UploadableRelationship' , ( new ReflectionClass( $this ) )->getTraitNames() );
    }

    /**
     * By now you should know the drill
     * @return boolean
     */

    public function isClassable()
    {
        return in_array( 'HugoKalidas\FlexCms\Abstracts\Traits\ClassableRelationship' , ( new ReflectionClass( $this ) )->getTraitNames() );
    }



    /**
     * Return the table name
     * @return string
     */
    public function getTableName()
    {
        return $this->table;
    }

    public function getTabs()
    {
        return $this->tabs;
    }
}