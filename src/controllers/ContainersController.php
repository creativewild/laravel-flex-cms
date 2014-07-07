<?php namespace HugoKalidas\LaravelFlexCms\Controllers;
use HugoKalidas\LaravelFlexCms\Containers\ContainersInterface;
use Illuminate\Support\MessageBag;
use HugoKalidas\LaravelFlexCms\Containers\Containers as Containers;
use HugoKalidas\LaravelFlexCms\Columns\Columns as Column;
use HugoKalidas\LaravelFlexCms\ElementClasses\ElementClasses as ElClasses;
use View, Redirect, Input, App, ReflectionClass, Request, Config, Response, Session;
class ContainersController extends ObjectBaseController {

    /**
     * The place to find the assets / URL keys for this controller
     * @var string
     */
    protected $view_key = 'containers';

    /**
     * Construct Shit
     */

    protected $classable = true;

    public function __construct( ContainersInterface $containers )
    {
        $this->model = $containers;
        parent::__construct();
    }


    public function postEdit( $id )
    {
        $record = $this->model->requireById( $id );
        $imp = Input::except('_token');
        $title = Input::get('title');

        $record->title=$title;
        $lay = Input::get('layouts_id');

        empty($lay) ? $record->layouts_id=null : $record->layouts_id= Input::get('layouts_id');
        Session::put('key',Input::all());
        $record->save();
        $keys = array_keys($imp);
        $a=preg_grep("/^col+/",$keys);
       // Session::put('key',$a);
        //save container classes
        $record->saveClasses();

//
//        // detach column classes
//        $cols=Containers::find($id)->columns();
//        if ($cols) {
//            foreach ($cols->get() as $col ) $col->deleteClasses();
//        }
//
//        //delete columns
//        //Containers::find($id)->columns()->delete();
//
//        $containerCols=Containers::find($id)->columns()->get();
//        $countCols=Containers::find($id)->columns()->count();
//
//        // for each column create a column and add classes
//        //Todo refactor to saveClasses
//        $count=0;
//        foreach ($a as $key => $input){
//            if (!$countCols) {
//                $col = new Column();
//                $col->order = $count;
//            }
//            else $col = $containerCols[$count];
//            $col->containers()->associate($record);
//            $col->save();
//            foreach ($imp[$input] as $_class ){
//
//                if ($_class != "default") {
//                    // Todo findOrNew
//                    $cl = ElClasses::find($_class);
//                    $col->classes()->save($cl);
//                }
//            }
//            $count++;
//        }

        return Redirect::to( $this->edit_url.$id )->with( 'success' , new MessageBag( array( 'Item Saved' ) ) );


    }
}