<?php namespace HugoKalidas\FlexCms\Layouts;
use HugoKalidas\FlexCms\Core\EloquentBaseRepository;

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