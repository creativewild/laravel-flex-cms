<?php namespace HugoKalidas\FlexCms\Newsletters;
use HugoKalidas\FlexCms\Core\EloquentBaseModel;

use HugoKalidas\FlexCms\Abstracts\Traits\UploadableRelationship;

use Str, Input;

class Newsletters extends EloquentBaseModel
{


    use UploadableRelationship; // Enable The Uploads Relationships

    /**
     * The table to get the data from
     * @var string
     */
    protected $table    = 'newsletters';

    /**
     * These are the mass-assignable keys
     * @var array
     */
    protected $fillable = array('title',  'content');

    protected $validationRules = [
        'title'     => 'required',

        'content'   => 'required',

    ];



    /**
     * Fill the model up like we usually do but also allow us to fill some custom stuff
     * @param  array $array The array of data, this is usually Input::all();
     * @return void
     */


}