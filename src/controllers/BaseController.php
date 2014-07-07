<?php
namespace HugoKalidas\FlexCms\Controllers;
use Illuminate\Routing\Controller;
use View, Config;

abstract class BaseController extends Controller{

    protected $whitelist = array();

    /**
     * The URL segment that can be used to access the system
     * @var string
     */
    protected $urlSegment;

    /**
     * Initializer.
     *
     * @access   public
     * @return   void
     */
    public function __construct()
    {
        // Achieve that segment
        $this->urlSegment = Config::get('laravel-flex-cms::app.access_url');

        // Setup composed views and the variables that they require
        //$this->beforeFilter( 'adminFilter' , array('except' => $this->whitelist) );
        $composed_views = array( 'laravel-flex-cms::*' );
        View::composer($composed_views, 'HugoKalidas\FlexCms\Composers\Page');
    }

}