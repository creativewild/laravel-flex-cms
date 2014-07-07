<?php namespace HugoKalidas\FlexCms\Containers;
use HugoKalidas\FlexCms\Core\EloquentBaseRepository;

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