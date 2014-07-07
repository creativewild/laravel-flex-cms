<?php namespace HugoKalidas\FlexCms\ElementIds;
use HugoKalidas\FlexCms\Core\EloquentBaseModel;

class ElementIds  extends EloquentBaseModel
{

    /**
     * The table to get the data from
     * @var string
     */
    protected $table    = 'element_ids';

    /**
     * These are the mass-assignable keys
     * @var array
     */
    protected $fillable = array();

    protected $validationRules = [];

    public function idable()
    {
        return $this->morphTo();
    }


}
