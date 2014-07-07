<?php namespace HugoKalidas\LaravelFlexCms\Controllers;
use HugoKalidas\LaravelFlexCms\Assets\AssetsInterface;
use Illuminate\Support\MessageBag;
use View, Redirect, Input, App, Request, Config, Response, Session, File;
class AssetsController extends ObjectBaseController {

    /**
     * The place to find the assets / URL keys for this controller
     * @var string
     */
    protected $view_key = 'assets';

    /**
     * Construct Shit
     */
    public function __construct( AssetsInterface $assets )
    {
        $this->model = $assets;
        parent::__construct();
    }

    public function postNew()
    {
        $record = $this->model->getNew( Input::all() );

        $valid = $this->validateWithInput === true ? $record->isValid( Input::all() ) : $record->isValid();
        $file=$this->storeInputFile();

        if( !$valid or !$file )
            return Redirect::to( $this->new_url )->with( 'errors' , $record->getErrors() )->withInput();

        $record->path=$file;
        // Run the hydration method that populates anything else that is required / runs any other
        // model interactions and save it.
        //Todo hydrate this shit
        $record->save();

        // Redirect that shit man! You did good! Validated and saved, man mum would be proud!

        return Redirect::to( $this->object_url )->with( 'success' , new MessageBag( array( 'Item Created' ) ) );
    }


    /**
     * Store assets
     * and get the filepath back
     */
    public function storeInputFile ($originalName = true) {

        if (Input::hasFile('file'))
        {

             $file = Input::file('file');

            if ($originalName){
                $filename = $file->getClientOriginalName();
            }
            else {
                $filename = str_random(12);
            }

            $extension =$file->getClientOriginalExtension();
            switch ($extension) {
                case "css":
                    $destinationPath = "css";
                    break;
                case "js":
                    $destinationPath = "js";
                    break;
                case "jpg":
                    $destinationPath = "images";
                    break;
                case "png":
                    $destinationPath = "images";
                    break;
                case "gif":
                    $destinationPath = "images";
                    break;
                case "woff":
                    $destinationPath = "fonts";
                    break;
                case "ttf":
                    $destinationPath = "fonts";
                    break;
                case "eot":
                    $destinationPath = "fonts";
                    break;
                default:
                    $destinationPath = "uploads";
            }

            $path = $destinationPath.'/'.$filename;
            $upload_success = Input::file('file')->move($destinationPath, $filename);

            if( $upload_success ) {
                return $path;
            } else {
                return false;
            }

        }
        else {
            return false;
        }



    }
}