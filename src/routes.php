<?php

// Get the URL segment to use for routing
$urlSegment = Config::get('laravel-flex-cms::app.access_url');








Route::get('admin/login'               , 'HugoKalidas\LaravelFlexCms\Controllers\DashController@getLogin'  );
Route::post('admin/login'               , 'HugoKalidas\LaravelFlexCms\Controllers\DashController@postLogin'  );
Route::post('/newsletter'               , 'HugoKalidas\LaravelFlexCms\Controllers\NewlettersController@postSubscribe'  );
Route::post('/contactar'               , 'HugoKalidas\LaravelFlexCms\Controllers\UtilitiesController@postContactUs'  );



// Filter all requests ensuring a user is logged in when this filter is called
Route::group(array('before' => 'auth'), function()
{
    //debug
    Route::get('/session', array('before' => 'auth' ,function()
    {
        var_dump(Session::all());
    }));
    //end debug

Route::post('admin/saveAsset'               , 'HugoKalidas\LaravelFlexCms\Controllers\UtilitiesController@saveAsset'  );
Route::post('addClass'               , 'HugoKalidas\LaravelFlexCms\Controllers\UtilitiesController@addClass'  );
$urlSegment = Config::get('laravel-flex-cms::app.access_url');

//todo clean and refactor
Route::post('detach-column','HugoKalidas\LaravelFlexCms\Controllers\UtilitiesController@postDetachColumn');
Route::post('attach-model','HugoKalidas\LaravelFlexCms\Controllers\UtilitiesController@postAttachModel');
Route::post('add-column','HugoKalidas\LaravelFlexCms\Controllers\UtilitiesController@postAddColumn');

Route::controller( $urlSegment.'/globals'     , 'HugoKalidas\LaravelFlexCms\Controllers\GlobalsController' );
Route::controller( $urlSegment.'/foo'     , 'HugoKalidas\LaravelFlexCms\Controllers\FooController' );
Route::controller( $urlSegment.'/users'     , 'HugoKalidas\LaravelFlexCms\Controllers\UsersController' );
Route::controller( $urlSegment.'/galleries' , 'HugoKalidas\LaravelFlexCms\Controllers\GalleriesController' );
Route::controller( $urlSegment.'/settings'  , 'HugoKalidas\LaravelFlexCms\Controllers\SettingsController' );
Route::controller( $urlSegment.'/blocks'    , 'HugoKalidas\LaravelFlexCms\Controllers\BlocksController' );
Route::controller( $urlSegment.'/posts'     , 'HugoKalidas\LaravelFlexCms\Controllers\PostsController' );
Route::controller( $urlSegment.'/pages'     , 'HugoKalidas\LaravelFlexCms\Controllers\PagesController' );
Route::controller( $urlSegment.'/assets'     , 'HugoKalidas\LaravelFlexCms\Controllers\AssetsController' );
Route::controller( $urlSegment.'/menus'     , 'HugoKalidas\LaravelFlexCms\Controllers\MenusController' );
Route::controller( $urlSegment.'/pageLayouts'     , 'HugoKalidas\LaravelFlexCms\Controllers\LayoutsController' );
Route::controller( $urlSegment.'/containers'     , 'HugoKalidas\LaravelFlexCms\Controllers\ContainersController' );
Route::controller( $urlSegment.'/newsletters'     , 'HugoKalidas\LaravelFlexCms\Controllers\NewslettersController' );
Route::controller( $urlSegment.'/includes'     , 'HugoKalidas\LaravelFlexCms\Controllers\IncludesController' );
Route::controller( $urlSegment              , 'HugoKalidas\LaravelFlexCms\Controllers\DashController'  );

});


$languages = array('pt', 'en','cn','es');
foreach($languages as $language)
{
    Route::group(array('prefix' => $language), function()
    {


        Route::get ('/galeria', 'HugoKalidas\LaravelFlexCms\Controllers\MainController@getGaleriasIndex');
        Route::get ('/galeria/{id}', 'HugoKalidas\LaravelFlexCms\Controllers\MainController@getGaleria');
        Route::any ('/{key}', 'HugoKalidas\LaravelFlexCms\Controllers\MainController@getIndex');

    });
}


/** Include IOC Bindings **/
include __DIR__.'/bindings.php';
