<?php namespace HugoKalidas\FlexCms\Abstracts\Traits;

use Input;

trait AssetableRelationship
{

    /**
     * The relationship setup for taggable classes
     * @return Eloquent
     */
    public function assets()
    {
        return $this->morphToMany('HugoKalidas\FlexCms\Assets\Assets' , 'assetable');
    }




}