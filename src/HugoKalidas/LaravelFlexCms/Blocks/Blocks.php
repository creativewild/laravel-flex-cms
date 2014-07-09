<?php namespace HugoKalidas\LaravelFlexCms\Blocks;
use HugoKalidas\LaravelFlexCms\Core\EloquentBaseModel;
use HugoKalidas\LaravelFlexCms\Abstracts\Traits\TaggableRelationship;
use HugoKalidas\LaravelFlexCms\Abstracts\Traits\UploadableRelationship;
use HugoKalidas\LaravelFlexCms\Abstracts\Traits\LayoutableRelationship;
use HugoKalidas\LaravelFlexCms\Abstracts\Traits\AssetableRelationship;
use HugoKalidas\LaravelFlexCms\Posts\Posts;

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
                                'Tabs-left' => 'Tabs-left',
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
        return $this->belongsToMany('HugoKalidas\LaravelFlexCms\Posts\Posts')->orderBy('blocks_posts.id', 'asc');
    }

    public function pages() {
        return $this->belongsToMany('HugoKalidas\LaravelFlexCms\Pages\Pages', 'pages_blocks');
    }

    public function columns() {
        return $this->belongsToMany('HugoKalidas\LaravelFlexCms\Columns\Columns')->withPivot('pages_id');
    }

    public function containers() {
        return $this->belongsTo('HugoKalidas\LaravelFlexCms\Containers\Containers');
    }


}
