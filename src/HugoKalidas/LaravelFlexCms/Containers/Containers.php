<?php namespace HugoKalidas\LaravelFlexCms\Containers;
use HugoKalidas\LaravelFlexCms\Core\EloquentBaseModel;
use HugoKalidas\LaravelFlexCms\Abstracts\Traits\ClassableRelationship;
use HugoKalidas\LaravelFlexCms\Columns\Columns as Columns;

class Containers  extends EloquentBaseModel
{
    use ClassableRelationship;
    /**
     * The table to get the data from
     * @var string
     */
    protected $table    = 'containers';
    public $timestamps = false;

    /**
     * These are the mass-assignable keys
     * @var array
     */
    protected $fillable = array('title', 'classes[]','layouts_id');

    protected $validationRules = [
        'title'     => 'required',


    ];


    public function blocks(){
       return $this->hasMany('HugoKalidas\LaravelFlexCms\Blocks\Blocks');
    }

    public function layouts(){
        return $this->belongsTo('HugoKalidas\LaravelFlexCms\Layouts\Layouts');
    }

    public function columns(){
        return $this->hasMany('HugoKalidas\LaravelFlexCms\Columns\Columns');
    }

    //lame helpers

    public function createColumnSaveClass($class){

        $column = new Columns();
        $this->columns()->save($column);
        $column->classes()->save($class);

    }

    public function saveColumnClass($column, $class){

        $this->columns()->save($column);
        $column->classes()->save($class);

    }





}
