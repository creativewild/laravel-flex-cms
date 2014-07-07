<?php namespace HugoKalidas\FlexCms\Pages;
use HugoKalidas\FlexCms\Core\EloquentBaseRepository;

class PagesRepository extends EloquentBaseRepository implements PagesInterface
{

    /**
     * Construct Shit
     * @param Pages $pages
     */
    public function __construct( Pages $pages )
    {
        $this->model = $pages;
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