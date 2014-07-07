<?php namespace HugoKalidas\FlexCms\Blocks;
use HugoKalidas\FlexCms\Core\EloquentBaseRepository;
use HugoKalidas\FlexCms\Abstracts\Traits\TaggableRepository;

class BlocksRepository extends EloquentBaseRepository implements BlocksInterface
{

    use TaggableRepository;

    /**
     * Construct Shit
     * @param Blocks $blocks
     */
    public function __construct( Blocks $blocks )
    {
        $this->model = $blocks;
    }

    /**
     * Get all the blocks where the key is equal to the item you mention
     * @return Eloquent
     */
    public function getByKey($key)
    {
        return $this->model->where('key','=',$key)->first();
    }

    public function getAllByType()
    {
        return $this->model->orderBy('type','asc')->get();
    }

}