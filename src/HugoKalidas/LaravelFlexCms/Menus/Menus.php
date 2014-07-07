<?php namespace HugoKalidas\LaravelFlexCms\Menus;
use HugoKalidas\LaravelFlexCms\Core\EloquentBaseModel;
use HugoKalidas\LaravelFlexCms\Abstracts\Traits\TaggableRelationship;
use HugoKalidas\LaravelFlexCms\Abstracts\Traits\UploadableRelationship;
use HugoKalidas\LaravelFlexCms\Posts\Posts;

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
        return $this->belongsToMany('HugoKalidas\LaravelFlexCms\Pages\Pages')->orderBy('menus_pages.id', 'asc');
    }
}
