<?php namespace HugoKalidas\LaravelFlexCms\Controllers;
use Illuminate\Support\MessageBag;
use View, Redirect, Input, App, ReflectionClass, Request, Config, Response, Session;
use HugoKalidas\LaravelFlexCms\Core\Exceptions\EntityNotFoundException;

abstract class ObjectBaseController extends BaseController {

    /**
     * The model to work with for editing stuff
     */
    protected $model;

    /**
     * The place to find some standardised views ( products, posts etc )
     * @var string
     */
    protected $view_key;

    /**
     * The URL to get the root of this object ( /admin/posts for example )
     * @var string
     */
    protected $object_url;

    /**
     * The URL that is used to edit shit
     * @var string
     */
    protected $edit_url;

    /**
     * The URL to create a new entry
     * @var string
     */
    protected $new_url;

    /**
     * The URL to delete an entry
     * @var string
     */
    protected $delete_url;

    /**
     * Is the controller allowed to upload images?
     * @var boolean
     */
    protected $uploadable;

    /**
     * Is the controller allowed to have tags?
     * @var boolean
     */
    protected $taggable;

    protected $classable;

    /**
     * Can items be deleted?
     * @var boolean
     */
    protected $deletable = true;

    /**
     * The uploads model
     * @var UploadsInterface
     */
    protected $uploads_model;

    /**
     * By default a mass assignment is used to validate things on a model
     * Sometimes you want to confirm inputs (such as password confirmations)
     * that you don't want to be necessarily stored on the model. This will validate
     * inputs from Input::all() not from $model->fill();
     * @var boolean
     */
    protected $validateWithInput = false;

    public function __construct()
    {
        parent::__construct();
        $this->uploads_model = App::make('HugoKalidas\LaravelFlexCms\Uploads\UploadsInterface');

        $this->setHandyUrls();
        $this->shareHandyUrls();
        $this->setTraitableProperties();
        $this->setViewObjectAbilities();
    }

    /**
     * Main users page.
     *
     * @access   public
     * @return   View
     */
    public function getIndex()
    {
        return View::make( 'laravel-flex-cms::'.$this->view_key.'.index' )
                     ->with( 'items' , $this->model->getAll() );
    }

    /**
     * The new object
     * @access public
     * @return View
     */

    public function getNew(){
        if( !View::exists( 'laravel-flex-cms::'.$this->view_key.'.new' ) )
            return App::abort(404, 'Page not found');

        return View::make('laravel-flex-cms::'.$this->view_key.'.new')->with('model',$this->view_key);
    }

    /**
     * The generic method for the start of editing something
     * @return View
     */
    public function getEdit( $id )
    {
        try{
            $item = $this->model->requireById($id);
        } catch( EntityNotFoundException $e ){
            return Redirect::to( $this->object_url )->with('errors', new MessageBag( array("An item with the ID:$id could not be found.") ) );
        }

        if( !View::exists( 'laravel-flex-cms::'.$this->view_key.'.edit' ) )
            return App::abort(404, 'Page not found');


        $uploadsTarget=array();

        if ($item->isUploadable()) {
            $uploadsArray = $item->uploads()->get();

            foreach ($uploadsArray as $index) {
                $uploadsTarget[]="/uploads/".$index['path'].'/'.$item->id.'/'.$index['filename'];

            }
        }

        $uploadsTarget = json_encode($uploadsTarget);

        return View::make('laravel-flex-cms::'.$this->view_key.'.edit')
                    ->with( 'item' , $item )
                    ->with('model',$this->view_key)
                    ->with('itemUploads', $uploadsTarget );
    }

    /**
     * Delete an object based on the ID passed in
     * @param  integer $id The object ID
     * @return Redirect
     */
    public function getDelete( $id ){

        if( $this->deletable == false )
            return App::abort(404, 'Page not found');

        $model = $this->model->getById($id)->delete();

        $message = 'The item was successfully removed.';
        return Redirect::to( $this->object_url )
                         ->with('success', new MessageBag( array( $message ) ) );
    }

    /**
     * The new object method, very generic, just allows mass assignable stuff to be filled and saved
     * @return Redirect
     */
    public function postNew()
    {
        $record = $this->model->getNew( Input::all() );

        $valid = $this->validateWithInput === true ? $record->isValid( Input::all() ) : $record->isValid();

        if( !$valid )
            return Redirect::to( $this->new_url )->with( 'errors' , $record->getErrors() )->withInput();

        // Run the hydration method that populates anything else that is required / runs any other
        // model interactions and save it.
        //Todo hydrate this shit
        $record->save();

        // Redirect that shit man! You did good! Validated and saved, man mum would be proud!

        return Redirect::to( $this->object_url )->with( 'success' , new MessageBag( array( 'Item Created' ) ) );
    }

    /**
     * The method to handle the posted data
     * @param  integer $id The ID of the object
     * @return Redirect
     */
    public function postEdit( $id )
    {
        $record = $this->model->requireById( $id );
        $record->fill( Input::all() );

        $valid = $this->validateWithInput === true ? $record->isValid( Input::all() ) : $record->isValid();


        //mine Todo -- refactor into generic $keyInputMultiple call_user_func($record,$relationship)
        if (Input::has("postsBlock")){
            $record->posts()->detach();
            foreach (Input::get("postsBlock") as $post){

                    $record->posts()->attach($post);


            }

        }

        if (Input::has("blocksPage")){
            $record->blocks()->detach();
            foreach (Input::get("blocksPage") as $block){


                    $record->blocks()->attach($block);


            }

        }

        if (Input::has("pagesMenu")){
            $record->pages()->detach();
            foreach (Input::get("pagesMenu") as $page){
                //$pages = $record->pages()->where('pages_id','=',$page)->count();
                //if ($pages == 0) {
                    $record->pages()->attach($page);
                //}

            }

        }
        //end Todo

        if( !$valid )
            return Redirect::to( $this->edit_url.$id )->with( 'errors' , $record->getErrors() )->withInput();

        // Run the hydration method that populates anything else that is required / runs any other
        // model interactions and save it.
        $record->hydrateRelations()->save();

        // Redirect that shit man! You did good! Validated and saved, man mum would be proud!
        return Redirect::to( $this->edit_url.$id )->with( 'success' , new MessageBag( array( 'Item Saved' ) ) );
    }

    /**
     * Upload an image for this product ID
     * @return Response
     */
    public function postUpload( $id ){

        // This should only be accessible via AJAX you know...
        if( !Request::ajax() or !$this->model->getById( $id ) )
            Response::json('error', 400);

        $key = $this->model->getModel()->getTableName();
        $type = get_class( $this->model->getModel() );
        $success = $this->uploads_model->doUpload( $id , $type , $key );

        if(!$success)
            Response::json('error', 400);

        return Response::json('success', 200);
    }

    /**
     * Set the order of the images
     * @return Response
     */
    public function postOrderImages(){
        // This should only be accessible via AJAX you know...
        if( !Request::ajax() )
            Response::json('error', 400);

        // Ensure that the product images that need to be deleted get deleted
        $this->uploads_model->setOrder( Input::get('data') );

        return Response::json('success', 200);
    }

    /**
     * Set the URL's to be used in the views
     * @return void
     */
    private function setHandyUrls()
    {
        if( is_null( $this->object_url ) )
            $this->object_url = url($this->urlSegment.'/'.$this->view_key);

        if( is_null( $this->edit_url ) )
            $this->edit_url = $this->object_url.'/edit/';

        if( is_null( $this->new_url ) )
            $this->new_url = $this->object_url.'/new';

        if( is_null( $this->delete_url ) )
            $this->delete_url = $this->object_url.'/delete/';
    }

    /**
     * Set the view to have variables detailing some of the key URL's used in the views
     * Trying to keep views generic...
     * @return void
     */
    private function shareHandyUrls()
    {
        // Share these variables with any views
        View::share('object_url', $this->object_url);
        View::share('edit_url', $this->edit_url);
        View::share('new_url', $this->new_url);
        View::share('delete_url', $this->delete_url);
    }

    /**
     * Set the view variables for this object. If you can upload tell it, if you can tag, tell it.
     * @return void
     */
    private function setViewObjectAbilities()
    {
        View::share('uploadable', $this->uploadable);
        View::share('taggable', $this->taggable);
    }

    /**
     * Set the class properties for if this object should allow uploads or tags
     * Uses reflection to check the model to see if it uses a taggable / uploadable trait
     */
    private function setTraitableProperties()
    {
        if( is_null( $this->taggable ) )
            $this->taggable = $this->model->getModel()->isTaggable();

        if( is_null( $this->uploadable ) )
            $this->uploadable = $this->model->getModel()->isUploadable();

    }



}