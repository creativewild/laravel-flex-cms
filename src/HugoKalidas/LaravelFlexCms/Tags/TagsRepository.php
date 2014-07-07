<?php namespace HugoKalidas\LaravelFlexCms\Tags;
use HugoKalidas\LaravelFlexCms\Core\EloquentBaseRepository;

class TagsRepository extends EloquentBaseRepository implements TagsInterface
{

    /**
     * Construct Shit
     * @param Tags $tags
     */
    public function __construct( Tags $tags )
    {
        $this->model = $tags;
    }

}