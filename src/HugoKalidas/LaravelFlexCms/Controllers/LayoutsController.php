<?php namespace HugoKalidas\LaravelFlexCms\Controllers;
use HugoKalidas\LaravelFlexCms\Layouts\LayoutsInterface;
use Illuminate\Support\MessageBag;
use HugoKalidas\LaravelFlexCms\Layouts\Layouts as Layouts;
use HugoKalidas\LaravelFlexCms\Columns\Columns as Column;
use HugoKalidas\LaravelFlexCms\ElementClasses\ElementClasses as ElClasses;
use View, Redirect, Input, App, ReflectionClass, Request, Config, Response, Session;
class LayoutsController extends ObjectBaseController {

    /**
     * The place to find the assets / URL keys for this controller
     * @var string
     */
    protected $view_key = 'pageLayouts';

    /**
     * Construct Shit
     */

    protected $classable = true;

    public function __construct( LayoutsInterface $layouts )
    {
        $this->model = $layouts;
        parent::__construct();
    }

/*
    public function postEdit( $id )
    {
        $record = $this->model->requireById( $id );
        $imp = Input::except('_token');
        $keys = array_keys($imp);
        $a=preg_grep("/^col+/",$keys);

        //save container classes
       // $record->saveClasses();


        // detach column classes
        $cols=Layouts::find($id)->columns();
        if ($cols) {
            foreach ($cols->get() as $col ) $col->deleteClasses();
        }

        //delete columns
        Layouts::find($id)->columns()->delete();

        // for each column create a column and add classes
        //Todo refactor to saveClasses

        foreach ($a as $key => $input){
            $col = new Column();
            $col->layouts()->associate($record);
            $col->save();
            foreach ($imp[$input] as $_class ){

                if ($_class != "default") {
                    // Todo findOrNew
                    $cl = ElClasses::find($_class);
                    $col->classes()->save($cl);
                }
            }
        }

        return Redirect::to( $this->edit_url.$id )->with( 'success' , new MessageBag( array( 'Item Saved' ) ) );


    }*/
}