<?php namespace HugoKalidas\FlexCms\Abstracts\Traits;

trait IdableRepository
{
    //Todo eliminate
    /**
     * Get By elements_id  that have a id of the type passed in
     * @param $element_id
     * @return Eloquent
     */
    public function getByElementId($element_id)
    {
        $table = $this->model->getTableName();
        return $this->model->join('element_ids', 'element_ids.idable_id', '=', $table.'.id')->where('html_ID','=',$$element_id)->first();
    }

}