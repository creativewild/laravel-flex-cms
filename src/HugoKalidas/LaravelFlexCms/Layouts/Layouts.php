<?php namespace HugoKalidas\FlexCms\Layouts;
use HugoKalidas\FlexCms\Core\EloquentBaseModel;

use HugoKalidas\FlexCms\Columns\Columns as Columns;

class Layouts  extends EloquentBaseModel
{

    /**
     * The table to get the data from
     * @var string
     */
    protected $table    = 'layouts';
    public $timestamps = false;

    /**
     * These are the mass-assignable keys
     * @var array
     */
    protected $fillable = array('title', 'classes[]');

    protected $validationRules = [
        'title'     => 'required',


    ];

/*
    public function blocks(){
       return $this->hasMany('HugoKalidas\FlexCms\Blocks\Blocks');
    }*/

    public function pages(){
        return $this->hasMany('HugoKalidas\FlexCms\Pages\Pages');
    }

  /*  public function columns(){
        return $this->hasMany('HugoKalidas\FlexCms\Columns\Columns');
    }*/

    //lame helpers

/*    public function createColumnSaveClass($class){

        $column = new Columns();
        $this->columns()->save($column);
        $column->classes()->save($class);

    }

    public function saveColumnClass($column, $class){

        $this->columns()->save($column);
        $column->classes()->save($class);

    }*/

    public function containers(){
        return $this->hasMany('HugoKalidas\FlexCms\Containers\Containers');
    }



}
