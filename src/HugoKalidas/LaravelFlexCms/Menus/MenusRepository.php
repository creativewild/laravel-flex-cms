<?php namespace HugoKalidas\FlexCms\Menus;
use HugoKalidas\FlexCms\Core\EloquentBaseRepository;
use HugoKalidas\FlexCms\Abstracts\Traits\TaggableRepository;

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