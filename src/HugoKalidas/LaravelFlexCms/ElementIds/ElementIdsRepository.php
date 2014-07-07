<?php namespace HugoKalidas\LaravelFlexCms\ElementIds;
use HugoKalidas\LaravelFlexCms\Core\EloquentBaseRepository;

class ElementIdsRepository extends EloquentBaseRepository implements ElementIdsInterface
{

    /**
     * Construct Shit
     * @param ElementIds $element_ids
     */
    public function __construct( ElementIds $element_ids )
    {
        $this->model = $element_ids;
    }

}