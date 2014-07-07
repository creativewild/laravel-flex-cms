<?php namespace HugoKalidas\LaravelFlexCms\Controllers;
use HugoKalidas\LaravelFlexCms\Menus\MenusInterface;

class MenusController extends ObjectBaseController {

    /**
     * The place to find the views / URL keys for this controller
     * @var string
     */
    protected $view_key = 'menus';

    /**
     * Construct Shit
     */
    public function __construct( MenusInterface $menus )
    {
        $this->model = $menus;
        parent::__construct();
    }

}