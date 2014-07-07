<?php namespace HugoKalidas\LaravelFlexCms\Menus;
use HugoKalidas\LaravelFlexCms\Core\EloquentBaseRepository;
use HugoKalidas\LaravelFlexCms\Abstracts\Traits\TaggableRepository;

class MenusRepository extends EloquentBaseRepository implements MenusInterface
{

    use TaggableRepository;

    /**
     * Construct Shit
     * @param Menus $menus
     */
    public function __construct( Menus $menus )
    {
        $this->model = $menus;
    }

    /**
     * Get all the blocks where the key is equal to the item you mention
     * @return Eloquent
     */
    public function getByKey($key)
    {
        return $this->model->where('key','=',$key)->first();
    }

}