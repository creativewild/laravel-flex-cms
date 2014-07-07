<?php namespace HugoKalidas\LaravelFlexCms\Galleries;
use HugoKalidas\LaravelFlexCms\Core\EloquentBaseRepository;
use HugoKalidas\LaravelFlexCms\Abstracts\Traits\TaggableRepository;

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