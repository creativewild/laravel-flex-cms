<?php namespace HugoKalidas\FlexCms\Containers;
use HugoKalidas\FlexCms\Core\EloquentBaseModel;
use HugoKalidas\FlexCms\Abstracts\Traits\ClassableRelationship;
use HugoKalidas\FlexCms\Columns\Columns as Columns;

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
       return $this->hasMany('HugoKalidas\FlexCms\Blocks\Blocks');
    }

    public function layouts(){
        return $this->belongsTo('HugoKalidas\FlexCms\Layouts\Layouts');
    }

    public function columns(){
        return $this->hasMany('HugoKalidas\FlexCms\Columns\Columns');
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
