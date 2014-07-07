<?php namespace HugoKalidas\FlexCms\Abstracts\Traits;

use Input;

trait ContainableRelationship
{

    /**
     * The relationship setup for taggable classes
     * @return Eloquent
     */
    public function containers()
    {
        return $this->belongsTo( 'HugoKalidas\FlexCms\Containers\Containers');
    }

    public function saveContainers($container)
    {
        $this->containers()->associate($container)->save();
    }





}