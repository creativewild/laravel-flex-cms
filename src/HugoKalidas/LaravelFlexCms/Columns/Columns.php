<?php namespace HugoKalidas\LaravelFlexCms\Columns;
use HugoKalidas\LaravelFlexCms\Core\EloquentBaseModel;
use HugoKalidas\LaravelFlexCms\Abstracts\Traits\ClassableRelationship;

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
        return $this->belongsTo('HugoKalidas\LaravelFlexCms\Containers\Containers');
    }

    public function blocks() {
        return $this->belongsToMany('HugoKalidas\LaravelFlexCms\Blocks\Blocks')->withPivot('pages_id');
    }

}
