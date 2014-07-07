<?php namespace HugoKalidas\FlexCms\Controllers;
use HugoKalidas\FlexCms\Pages\PagesInterface;
use HugoKalidas\FlexCms\Pages\Pages;
use View;
class PagesController extends ObjectBaseController {

    /**
     * The place to find the pages / URL keys for this controller
     * @var string
     */
    protected $view_key = 'pages';

    /**
     * Construct Shit
     */
    public function __construct( PagesInterface $page )
    {
        $this->model = $page;
        parent::__construct();
    }


    public function getIndex()
    {
        return View::make( 'laravel-flex-cms::'.$this->view_key.'.index' )
            ->with( 'items' , Pages::where('global','=',0)->get() );
    }
}