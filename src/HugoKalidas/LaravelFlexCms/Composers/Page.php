<?php
namespace HugoKalidas\FlexCms\Composers;
use Illuminate\Support\MessageBag;
use Auth, Session, Config, App;

class Page{

    /**
     * Compose the view with the following variables bound do it
     * @param  View $view The View
     * @return null
     */
    public function compose($view)
    {
        $settings = App::make('HugoKalidas\FlexCms\Settings\SettingsInterface');

        $view->with('user', Auth::user())
             ->with('app_name', $settings->getAppName() )
             ->with('appUrl', Config::get('app.url'))
             ->with('urlSegment', Config::get('laravel-bootstrap::app.access_url') )
             ->with('menu_items', Config::get('laravel-bootstrap::app.menu_items') )
             ->with('success', Session::get('success' , new MessageBag ) );
    }

}