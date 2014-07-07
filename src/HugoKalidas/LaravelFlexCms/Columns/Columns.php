<?php namespace HugoKalidas\FlexCms\Columns;
use HugoKalidas\FlexCms\Core\EloquentBaseModel;
use HugoKalidas\FlexCms\Abstracts\Traits\ClassableRelationship;

class Columns  extends EloquentBaseModel
{
    use ClassableRelationship;
    /**
     * The table to get the data from
     * @var string
     */
    protected $table = 'columns';

    public $timestamps = false;

    /**
     * These are the mass-assignable keys
     * @var array
     */
    protected $fillable = array();

    protected $validationRules = [];


    public function containers(){
        return $this->belongsTo('HugoKalidas\FlexCms\Containers\Containers');
    }

    public function blocks() {
        return $this->belongsToMany('HugoKalidas\FlexCms\Blocks\Blocks')->withPivot('pages_id');
    }

}
