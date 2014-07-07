<?php namespace HugoKalidas\FlexCms\Assets;
use HugoKalidas\FlexCms\Core\EloquentBaseRepository;

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