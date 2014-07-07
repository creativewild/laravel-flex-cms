<?php namespace HugoKalidas\FlexCms\Posts;
use HugoKalidas\FlexCms\Core\EloquentBaseModel;
use HugoKalidas\FlexCms\Abstracts\Traits\TaggableRelationship;
use HugoKalidas\FlexCms\Abstracts\Traits\UploadableRelationship;
use HugoKalidas\FlexCms\Abstracts\Traits\ClassableRelationship;
use Str, Input;

class Posts extends EloquentBaseModel
{

    use TaggableRelationship; // Enable The Tags Relationships
    use UploadableRelationship; // Enable The Uploads Relationships
    use ClassableRelationship;

    /**
     * The table to get the data from
     * @var string
     */
    protected $table    = 'posts';

    /**
     * These are the mass-assignable keys
     * @var array
     */
    protected $fillable = array('title', 'slug', 'content','keywords','description','truncate','truncate_length','type',
                                'en','es','cn','title_en','title_es','title_cn','intro_pt','intro_en','intro_es','intro_cn');

    protected $validationRules = [
        'title'     => 'required',
        'slug'      => 'required|unique:posts,id,<id>',
        'content'   => 'required',

    ];

    public $typeOptions = array('Article' => 'Article',
        'Video' => 'Video',
        'Featured' => 'Featured',
        'HTML' => 'HTML',
        'Pub' => 'Pub',
        'Slide' => 'Slide',



       );

    /**
     * Fill the model up like we usually do but also allow us to fill some custom stuff
     * @param  array $array The array of data, this is usually Input::all();
     * @return void
     */
    public function fill( array $attributes )
    {
        parent::fill( $attributes );
        $this->slug = Str::slug( $this->title , '-' );
    }

    public function blocks() {
        return $this->belongsToMany('Blocks');
    }

}