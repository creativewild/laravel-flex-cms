<?php namespace HugoKalidas\FlexCms\Controllers;
use HugoKalidas\FlexCms\Blocks\BlocksInterface;
use Illuminate\Support\MessageBag;
use View, Redirect, Input, App, ReflectionClass, Request, Config, Response, Session;
class BlocksController extends ObjectBaseController {

    /**
     * The place to find the views / URL keys for this controller
     * @var string
     */
    protected $view_key = 'blocks';

    /**
     * Construct Shit
     */
    public function __construct( BlocksInterface $blocks )
    {
        $this->model = $blocks;
        parent::__construct();
    }

    public function postEdit($id){
        $record = $this->model->requireById( $id );
        $cont = Input::get('containers_id');
        empty($cont) ? $record->containers_id=null : $record->containers_id= Input::get('containers_id');
        $record->save();

        parent::postEdit($id);


        return Redirect::to( $this->edit_url.$id )->with( 'success' , new MessageBag( array( 'Item Saved' ) ) );
    }

    public function getIndex()
    {
        return View::make( 'laravel-flex-cms::'.$this->view_key.'.index' )
            ->with( 'items' , $this->model->getAllByType() );
    }

}