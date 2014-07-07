<?php namespace HugoKalidas\FlexCms\Abstracts\Traits;
use App;

trait UploadableRelationship
{

    /**
     * The relationship setup for taggable classes
     * @return Eloquent
     */
    public function uploads()
    {
        return $this->morphMany( 'HugoKalidas\FlexCms\Uploads\Uploads' , 'uploadable' )->orderBy('order','asc');
    }

    /**
     * Remove the imagery associated with this model
     * @return void
     */
    public function deleteImagery($id)
    {
        $uploads = App::make('HugoKalidas\FlexCms\Uploads\UploadsInterface');
        $uploads->deleteById( $id );
    }

    /**
     * Remove the imagery associated with this model
     * @return void
     */
    public function deleteAllImagery()
    {
        $uploads = App::make('HugoKalidas\FlexCms\Uploads\UploadsInterface');
        $uploads->deleteByIdType( $this->id , $this->getTableName() );
    }

}