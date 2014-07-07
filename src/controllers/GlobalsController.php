<?php
namespace HugoKalidas\FlexCms\Controllers;
use HugoKalidas\FlexCms\Globals\GlobalsInterface;
use HugoKalidas\FlexCms\Globals\Globals;
use View;


class GlobalsController extends ObjectBaseController{


    /**
     * The place to find the pages / URL keys for this controller
     * @var string
     */
    protected $view_key = 'globals';

    /**
     * Construct Shit
     */
    public function __construct( GlobalsInterface $global )
    {
        $this->model = $global;
        parent::__construct();
    }

    public function getIndex()
    {
        return View::make( 'laravel-flex-cms::'.$this->view_key.'.index' )
            ->with( 'items' , Globals::where('global','=',1)->get() );
    }
} 