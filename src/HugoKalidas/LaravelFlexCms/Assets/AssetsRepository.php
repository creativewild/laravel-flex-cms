<?php namespace HugoKalidas\LaravelFlexCms\Assets;
use HugoKalidas\LaravelFlexCms\Core\EloquentBaseRepository;

class AssetsRepository extends EloquentBaseRepository implements AssetsInterface
{

    /**
     * Construct Shit
     * @param Assets $assets
     */
    public function __construct( Assets $assets )
    {
        $this->model = $assets;
    }



}