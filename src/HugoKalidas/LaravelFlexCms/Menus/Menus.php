<?php namespace HugoKalidas\FlexCms\Menus;
use HugoKalidas\FlexCms\Core\EloquentBaseModel;
use HugoKalidas\FlexCms\Abstracts\Traits\TaggableRelationship;
use HugoKalidas\FlexCms\Abstracts\Traits\UploadableRelationship;
use HugoKalidas\FlexCms\Posts\Posts;

class Menus extends EloquentBaseModel
{



    /**
     * The table to get the data from
     * @var string
     */
    protected $table    = 'menus';

    public $timestamps = false;

    /**
     * These are the mass-assignable keys
     * @var array
     */
    protected $fillable = array('title', 'key');

    protected $validationRules = [
        'title'     => 'required',


    ];

    public function pages() {
        return $this->belongsToMany('HugoKalidas\FlexCms\Pages\Pages')->orderBy('menus_pages.id', 'asc');
    }
}
