<?php namespace HugoKalidas\FlexCms\Pages;
use HugoKalidas\FlexCms\Core\EloquentBaseModel;
//use HugoKalidas\FlexCms\Core\ViewBaseModel;
use HugoKalidas\FlexCms\Abstracts\Traits\LayoutableRelationship;
use HugoKalidas\FlexCms\Abstracts\Traits\AssetableRelationship;


class Pages extends EloquentBaseModel
{
    use LayoutableRelationship; // Enable The Layouts Relationships
    use AssetableRelationship;

    /**
     * The table to get the data from
     * @var string
     */
    protected $table    = 'pages';

    protected  $tabs = true;


    /**
     * These are the mass-assignable keys
     * @var array
     */
    protected $fillable = array('title', 'key','keywords','description','layouts_id','title_en','title_es','title_cn');

    protected $validationRules = [
        'title'     => 'required',
        'key'      => 'required|unique:pages,id,<id>'

    ];

    public function blocks() {
        return $this->belongsToMany('HugoKalidas\FlexCms\Blocks\Blocks', 'pages_blocks','pages_id','blocks_id');
    }

    public function menus() {
        return $this->belongsToMany('HugoKalidas\FlexCms\Menus\Menus')->orderBy('menus_pages.id', 'asc');
    }

    public function filterBlocks ($type) {


       $blocks = $this->blocks()->get();

        $blocks= $blocks->filter(function($block) use ($type)
        {
            return $block->type == $type;
        });

        return $blocks;
    }

}
