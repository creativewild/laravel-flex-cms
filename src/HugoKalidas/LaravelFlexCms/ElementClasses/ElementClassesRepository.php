<?php namespace HugoKalidas\FlexCms\ElementClasses;
use HugoKalidas\FlexCms\Core\EloquentBaseRepository;

class ElementClassesRepository extends EloquentBaseRepository implements ElementClassesInterface
{

    /**
     * Construct Shit
     * @param ElementClasses $element_classes
     */
    public function __construct( ElementClasses $element_classes )
    {
        $this->model = $element_classes;
    }

}