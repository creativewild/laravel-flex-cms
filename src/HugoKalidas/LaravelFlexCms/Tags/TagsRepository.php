<?php namespace HugoKalidas\FlexCms\Tags;
use HugoKalidas\FlexCms\Core\EloquentBaseRepository;

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