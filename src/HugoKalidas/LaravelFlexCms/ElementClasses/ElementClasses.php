<?php namespace HugoKalidas\LaravelFlexCms\ElementClasses;
use HugoKalidas\LaravelFlexCms\Core\EloquentBaseModel;

class ElementClasses  extends EloquentBaseModel
{

    /**
     * The table to get the data from
     * @var string
     */
    protected $table    = 'element_classes';
    public $timestamps=false;

    /**
     * These are the mass-assignable keys
     * @var array
     */
    protected $fillable = array('html_class');

    protected $validationRules = [
        'html_class'     => 'required',

    ];

    public function layouts()
    {
        return $this->morphedByMany('HugoKalidas\LaravelFlexCms\Layouts\Layouts', 'classable');
    }

    public function columns()
    {
        return $this->morphedByMany('HugoKalidas\LaravelFlexCms\Columns\Columns', 'classable');
    }

}
