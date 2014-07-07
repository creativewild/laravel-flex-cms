<?php namespace HugoKalidas\FlexCms\Columns;
use HugoKalidas\FlexCms\Core\EloquentBaseRepository;

class ColumnsRepository extends EloquentBaseRepository implements ColumnsInterface
{

    /**
     * Construct Shit
     * @param Columns $columns
     */
    public function __construct( Columns $columns )
    {
        $this->model = $columns;
    }

}