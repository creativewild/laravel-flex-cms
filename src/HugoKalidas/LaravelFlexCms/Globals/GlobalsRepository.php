<?php namespace HugoKalidas\FlexCms\Globals;
use HugoKalidas\FlexCms\Core\EloquentBaseRepository;


class GlobalsRepository extends EloquentBaseRepository implements GlobalsInterface
{

    /**
     * Construct Shit
     * @param Pages $pages
     */
    public function __construct( Globals $globals )
    {
        $this->model = $globals;
    }

    /**
     * Get all the pages where the key is equal to the item you mention
     * @param $key
     * @return Eloquent
     */
    public function getByKey($key)
    {
        return $this->model->where('key','=',$key)->first();
    }

}


