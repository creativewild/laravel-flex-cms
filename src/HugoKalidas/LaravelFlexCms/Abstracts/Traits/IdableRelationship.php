<?php namespace HugoKalidas\FlexCms\Abstracts\Traits;
use HugoKalidas\FlexCms\ElementIds\ElementIds as ElementIdEloquent;
use Input;
// TODO refactor one to one
trait IdableRelationship
{

    /**
     * The relationship setup for taggable classes
     * @return Eloquent
     */
    public function element_id()
    {
        return $this->MorphOne( 'HugoKalidas\FlexCms\ElementIds\ElementIds' , 'idable' );
    }

    /**
     *
     * @return string
     */
    public function getElementId()
    {


        return $this->element_id->html_ID;
    }

    /**
     * Save element_ids,
     * @param  string $element_id
     * @return void
     */
    public function saveElementId( $element_id = null )
    {
        $element_id = is_null($element_id) ? Input::get('element_ids',false) : $element_id;

        // Delete all existing element_id for this item
        $this->element_id()->delete();

        $element_id_object = new ElementIdEloquent();
        $element_id_object->html_ID= $element_id;
        $this->element_id()->save( $element_id_object );



        return;
    }

}