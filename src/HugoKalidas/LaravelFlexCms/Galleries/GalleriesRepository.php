<?php namespace HugoKalidas\FlexCms\Galleries;
use HugoKalidas\FlexCms\Core\EloquentBaseRepository;
use HugoKalidas\FlexCms\Abstracts\Traits\TaggableRepository;

class GalleriesRepository extends EloquentBaseRepository implements GalleriesInterface
{

    use TaggableRepository;

    /**
     * Construct Shit
     * @param Galleries $galleries
     */
    public function __construct( Galleries $galleries )
    {
        $this->model = $galleries;
    }

}