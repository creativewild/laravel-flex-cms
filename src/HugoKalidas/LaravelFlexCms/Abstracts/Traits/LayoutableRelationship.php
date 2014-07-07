<?php namespace HugoKalidas\FlexCms\Abstracts\Traits;

use Input;

trait LayoutableRelationship
{

    /**
     * The relationship setup for taggable classes
     * @return Eloquent
     */
    public function layouts()
    {
        return $this->belongsTo( 'HugoKalidas\FlexCms\Layouts\Layouts');
    }

    public function saveLayouts($layout)
    {
        $this->layouts()->associate($layout)->save();
    }





}