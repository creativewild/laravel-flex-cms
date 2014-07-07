<?php namespace HugoKalidas\FlexCms\ElementIds;
use HugoKalidas\FlexCms\Core\EloquentBaseRepository;

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