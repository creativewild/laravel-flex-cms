<?php namespace HugoKalidas\LaravelFlexCms\Abstracts\Traits;

use Input;

trait LayoutableRelationship
{

    /**
     * The relationship setup for taggable classes
     * @return Eloquent
     */
    public function layouts()
    {
        return $this->belongsTo( 'HugoKalidas\LaravelFlexCms\Layouts\Layouts');
    }

    public function saveLayouts($layout)
    {
        $this->layouts()->associate($layout)->save();
    }





}