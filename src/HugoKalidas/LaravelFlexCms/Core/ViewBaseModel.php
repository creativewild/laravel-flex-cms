<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 6/4/14
 * Time: 5:06 PM
 */

namespace HugoKalidas\LaravelFlexCms\Core;

/**
 * Base model for allowing reads from sql views
 *
 * Class BaseModel
 * @package ProgrammingAreHard\Models
 */
abstract class ViewBaseModel extends EloquentBaseModel
{
    /**
     * Writable table
     *
     * @var string
     */
    protected $writeTable;

    /**
     * Read table/view
     *
     * @var string
     */
    protected $readFrom;

    /**
     * Read only attributes (not to be saved)
     *
     * @var array
     */
    protected $readOnly = [];

    /**
     * Cache for read only attribute values
     *
     * @var array
     */
    protected $readOnlyCache = [];

    /**
     * Instantiate and set the table
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->writeTable = $this->getTable();

        $this->toReadMode();
    }

    /**
     * Juggle the table and read only attributes
     *
     * @param array $options
     * @return bool
     * @throws \Exception
     */
    public function save(array $options = [])
    {
        $this->toWriteMode();

        $this->cacheReadOnly();

        try {

            $saved = parent::save($options);

        } catch (\Exception $e) {

            $this->toReadMode();

            throw $e;
        }

        $this->toReadMode();

        $this->restoreReadOnly();

        return $saved;
    }

    /**
     * Cache and remove read only attributes
     *
     * @return void
     */
    protected function cacheReadOnly()
    {
        $this->readOnlyCache = [];

        foreach ($this->readOnly as $key) {

            $value = $this->getAttributeValue($key);

            $this->readOnlyCache[$key] = $value;

            $this->__unset($key);
        }
    }

    /**
     * Restore the cached read only attributes
     *
     * @return void
     */
    protected function restoreReadOnly()
    {
        foreach ($this->readOnlyCache as $key => $value) {

            $this->setAttribute($key, $value);
        }
    }

    /**
     * Get the writable table
     *
     * @return string
     */
    public function getWriteTable()
    {
        return $this->writeTable;
    }

    /**
     * Swap to the writable table
     *
     * @return void
     */
    protected function toWriteMode()
    {
        $this->setTable($this->getWriteTable());
    }

    /**
     * Get the readable table/view
     *
     * @return string
     * @throws \Exception
     */
    public function getReadFrom()
    {
        if (is_null($this->readFrom)) {

            $this->readFrom = $this->getWriteTable();
        }

        return $this->readFrom;
    }

    /**
     * Swap to the readable table/view
     *
     * @return void
     */
    protected function toReadMode()
    {
        $this->setTable($this->getReadFrom());
    }

    /**
     * Convert the value to an int array if needed
     *
     * @param string|array $value
     * @return array
     */
    protected function intArrayAttribute($value)
    {
        if (is_string($value) and strlen($value) > 0) {

            $value = explode(',', $value);

            $value = array_map('intval', $value);
        }

        return is_array($value) ? $value : [];
    }
}