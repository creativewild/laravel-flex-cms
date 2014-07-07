<?php namespace HugoKalidas\FlexCms\Blocks;
use HugoKalidas\FlexCms\Core\EloquentBaseModel;
use HugoKalidas\FlexCms\Abstracts\Traits\TaggableRelationship;
use HugoKalidas\FlexCms\Abstracts\Traits\UploadableRelationship;
use HugoKalidas\FlexCms\Abstracts\Traits\LayoutableRelationship;
use HugoKalidas\FlexCms\Abstracts\Traits\AssetableRelationship;
use HugoKalidas\FlexCms\Posts\Posts;

class Blocks extends EloquentBaseModel
{

    use TaggableRelationship; // Enable The Tags Relationships
    use UploadableRelationship; // Enable The Uploads Relationships
    use LayoutableRelationship; // Enable The Layouts Relationships
    use AssetableRelationship;

    /**
     * The table to get the data from
     * @var string
     */
    protected $table    = 'blocks';

    protected $relations = array('posts','pages','columns');


    public $typeOptions = array('Selected' => 'Selected',
                                'Jumbotron' => 'Jumbotron',
                                'Recent' => 'Recent',
                                'Category' => 'Category',
                                'Tag' =>  'Tag',
                                'Popular' => 'Popular',
                                'Hot' =>'Hot',
                                'Alphabetic' => 'Alphabetic',
                                'AlphaReversed' =>'AlphaReversed',
                                'Chronological'=>'Chronological',
                                'Custom'=>'Custom');
    /**
     * These are the mass-assignable keys
     * @var array
     */
    protected $fillable = array('title', 'key', 'content','type');

    protected $validationRules = [
        'title'     => 'required',
        'key'      => 'required|unique:blocks,id,<id>'
    ];

    public function posts() {
        return $this->belongsToMany('HugoKalidas\FlexCms\Posts\Posts')->orderBy('blocks_posts.id', 'asc');
    }

    public function pages() {
        return $this->belongsToMany('HugoKalidas\FlexCms\Pages\Pages', 'pages_blocks');
    }

    public function columns() {
        return $this->belongsToMany('HugoKalidas\FlexCms\Columns\Columns')->withPivot('pages_id');
    }

    public function containers() {
        return $this->belongsTo('HugoKalidas\FlexCms\Containers\Containers');
    }


}
