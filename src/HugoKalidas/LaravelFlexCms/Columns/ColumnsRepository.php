<?php namespace HugoKalidas\LaravelFlexCms\Columns;
use HugoKalidas\LaravelFlexCms\Core\EloquentBaseRepository;

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