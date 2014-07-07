<?php namespace HugoKalidas\FlexCms\Galleries;
use HugoKalidas\FlexCms\Core\EloquentBaseModel;
use HugoKalidas\FlexCms\Abstracts\Traits\TaggableRelationship;
use HugoKalidas\FlexCms\Abstracts\Traits\UploadableRelationship;

class Galleries extends EloquentBaseModel
{

    use TaggableRelationship; // Enable The Tags Relationships
    use UploadableRelationship; // Enable The Uploads Relationships

    /**
     * The table to get the data from
     * @var string
     */
    protected $table    = 'galleries';

    /**
     * These are the mass-assignable keys
     * @var array
     */
    protected $fillable = array('title', 'slug', 'description');

    protected $validationRules = [
        'title'     => 'required',
        'slug'      => 'required|unique:galleries,id,<id>'
    ];

}
