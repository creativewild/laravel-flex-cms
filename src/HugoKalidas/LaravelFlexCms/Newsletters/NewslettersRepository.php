<?php namespace HugoKalidas\FlexCms\Newsletters;
use HugoKalidas\FlexCms\Core\EloquentBaseRepository;
use HugoKalidas\FlexCms\Abstracts\Traits\TaggableRepository;

class NewslettersRepository extends EloquentBaseRepository implements NewslettersInterface
{

    use TaggableRepository;

    /**
     * Construct Shit
     * @param Posts $newsletters
     */
    public function __construct( Newsletters $newsletters )
    {
        $this->model = $newsletters;
    }

    /**
     * Get all posts by date published ascending
     * @return Posts
     */
    public function getAllByDateAsc()
    {
        return $this->model->orderBy('created_at','asc')->get();
    }

    /**
     * Get all posts by date published descending
     * @return Posts
     */
    public function getAllByDateDesc()
    {
        return $this->model->orderBy('created_at','desc')->get();
    }

    public function getAllByType()
    {
        return $this->model->orderBy('type','asc')->get();
    }

}