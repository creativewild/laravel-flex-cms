<?php namespace HugoKalidas\FlexCms\Abstracts\Traits;

use Illuminate\Support\Facades\Session;
use Input;
use HugoKalidas\FlexCms\ElementClasses\ElementClasses as ClassEloquent;
trait ClassableRelationship
{

    /**
     * The relationship setup for classable classes
     * @return Eloquent
     */
    public function classes()
    {
        return $this->morphToMany('HugoKalidas\FlexCms\ElementClasses\ElementClasses' , 'classable');
    }

    public function saveClasses( $classes = null )
    {
        $classes = is_null($classes) ? Input::get('classes',false) : $classes;

        // Delete all existing classes for this item
        $this->deleteClasses();
         Session::put("CLASSES",$classes);
         if ($classes) {
             foreach($classes as $class){

                  /* Todo if not found
                    $classObject = new ClassEloquent();
                    $classObject->html_class = $class;
                    */
                 if ($class != "default") {
                 $class= ClassEloquent::find($class);
                 $this->classes()->save( $class );
                 }
             }
         }

        return;
    }


    //delete all classes attachments to this element
    public function deleteClasses( )
    {

        foreach ($this->classes()->get() as $cl) {

            $this->classes()->detach($cl);

        }

        return;
    }



}