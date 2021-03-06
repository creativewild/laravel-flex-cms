<?php namespace HugoKalidas\LaravelFlexCms\Abstracts\Traits;

trait TaggableRepository
{

    /**
     * Get all posts that have a tag of the type passed in
     * @param $tag
     * @return Eloquent
     */
    public function getAllByTag($tag)
    {
        $table = $this->model->getTableName();
        return $this->model->join('tags', 'tags.taggable_id', '=', $table.'.id')->where('tag','=',$tag)->get();
    }

}