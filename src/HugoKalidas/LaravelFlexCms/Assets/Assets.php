<?php namespace HugoKalidas\FlexCms\Assets;
use HugoKalidas\FlexCms\Core\EloquentBaseModel;

class Assets  extends EloquentBaseModel
{

    /**
     * The table to get the data from
     * @var string
     */
    protected $table    = 'assets';

    /**
     * These are the mass-assignable keys
     * @var array
     */
    protected $fillable = ['title','path','type','position','cdn','global'];

    protected $validationRules = [
                'title'     => 'required',
    ];

    public $typeOptions = ['Style'=>'Style','Style Framework'=>'Style Framework','Script'=>'Script','JS Library'=>'JS Library',
        'Plugin'=>'Plugin','Plugin Call'=>'Plugin Call','Event'=>'Event','Font'=>'Font','Vector'=>'Vector','Image'=>'Image'];

    public $positionOptions = ['Head-first'=>'Head-first','Head-last'=>'Head-last','Bottom-first'=>'Bottom-first','Bottom-last'=>'Bottom-last'];

    public $editable = ['Style','Script','Plugin','Plugin Call'];

    public $timestamps=false;

    public function blocks()
    {
        return $this->morphedByMany('HugoKalidas\FlexCms\Blocks\Blocks', 'assetable');
    }

    public function pages()
    {
        return $this->morphedByMany('HugoKalidas\FlexCms\Pages\Pages', 'assetable');
    }



}
