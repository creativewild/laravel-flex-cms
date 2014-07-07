<?php namespace HugoKalidas\LaravelFlexCms\Containers;
use HugoKalidas\LaravelFlexCms\Core\EloquentBaseRepository;

class ContainersRepository extends EloquentBaseRepository implements ContainersInterface
{

    /**
     * Construct Shit
     * @param Containers $Containers
     */
    public function __construct( Containers $containers )
    {
        $this->model = $containers;
    }

}