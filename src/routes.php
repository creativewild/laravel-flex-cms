<?php

// Get the URL segment to use for routing
$urlSegment = Config::get('laravel-flex-cms::app.access_url');





Route::get('/', function()
{
    return Redirect::to('pt/home-page');
});



Route::get('admin/login'               , 'HugoKalidas\FlexCms\Controllers\DashController@getLogin'  );
Route::post('admin/login'               , 'HugoKalidas\FlexCms\Controllers\DashController@postLogin'  );
Route::post('/newsletter'               , 'HugoKalidas\FlexCms\Controllers\NewlettersController@postSubscribe'  );
Route::post('/contactar'               , 'HugoKalidas\FlexCms\Controllers\UtilitiesController@postContactUs'  );



// Filter all requests ensuring a user is logged in when this filter is called
Route::group(array('before' => 'auth'), function()
{
    //debug
    Route::get('/session', array('before' => 'auth' ,function()
    {
        Kint::dump(Session::all());
    }));
    //end debug

Route::post('admin/saveAsset'               , 'HugoKalidas\FlexCms\Controllers\UtilitiesController@saveAsset'  );
Route::post('addClass'               , 'HugoKalidas\FlexCms\Controllers\UtilitiesController@addClass'  );
$urlSegment = Config::get('laravel-flex-cms::app.access_url');

//todo clean and refactor
Route::post('detach-column','HugoKalidas\FlexCms\Controllers\UtilitiesController@postDetachColumn');
Route::post('attach-model','HugoKalidas\FlexCms\Controllers\UtilitiesController@postAttachModel');
Route::post('add-column','HugoKalidas\FlexCms\Controllers\UtilitiesController@postAddColumn');

Route::controller( $urlSegment.'/globals'     , 'HugoKalidas\FlexCms\Controllers\GlobalsController' );
Route::controller( $urlSegment.'/foo'     , 'HugoKalidas\FlexCms\Controllers\FooController' );
Route::controller( $urlSegment.'/users'     , 'HugoKalidas\FlexCms\Controllers\UsersController' );
Route::controller( $urlSegment.'/galleries' , 'HugoKalidas\FlexCms\Controllers\GalleriesController' );
Route::controller( $urlSegment.'/settings'  , 'HugoKalidas\FlexCms\Controllers\SettingsController' );
Route::controller( $urlSegment.'/blocks'    , 'HugoKalidas\FlexCms\Controllers\BlocksController' );
Route::controller( $urlSegment.'/posts'     , 'HugoKalidas\FlexCms\Controllers\PostsController' );
Route::controller( $urlSegment.'/pages'     , 'HugoKalidas\FlexCms\Controllers\PagesController' );
Route::controller( $urlSegment.'/assets'     , 'HugoKalidas\FlexCms\Controllers\AssetsController' );
Route::controller( $urlSegment.'/menus'     , 'HugoKalidas\FlexCms\Controllers\MenusController' );
Route::controller( $urlSegment.'/pageLayouts'     , 'HugoKalidas\FlexCms\Controllers\LayoutsController' );
Route::controller( $urlSegment.'/containers'     , 'HugoKalidas\FlexCms\Controllers\ContainersController' );
Route::controller( $urlSegment.'/newsletters'     , 'HugoKalidas\FlexCms\Controllers\NewslettersController' );
Route::controller( $urlSegment              , 'HugoKalidas\FlexCms\Controllers\DashController'  );

});


$languages = array('pt', 'en','cn','es');
foreach($languages as $language)
{
    Route::group(array('prefix' => $language), function()
    {


        Route::get ('/galeria', 'HugoKalidas\FlexCms\Controllers\MainController@getGaleriasIndex');
        Route::get ('/galeria/{id}', 'HugoKalidas\FlexCms\Controllers\MainController@getGaleria');
        Route::any ('/{key}', 'HugoKalidas\FlexCms\Controllers\MainController@getIndex');

    });
}


/** Include IOC Bindings **/
include __DIR__.'/bindings.php';
