<?php namespace HugoKalidas\LaravelFlexCms\Layouts;
use HugoKalidas\LaravelFlexCms\Core\EloquentBaseRepository;

class LayoutsRepository extends EloquentBaseRepository implements LayoutsInterface
{

    /**
     * Construct Shit
     * @param Layouts $layouts
     */
    public function __construct( Layouts $layouts )
    {
        $this->model = $layouts;
    }

}