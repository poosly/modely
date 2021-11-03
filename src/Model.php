<?php

namespace Poosly\Modely;

use Poosly\Modely\Traits\HasMeta;

abstract class Model
{
    use HasMeta;

    /**
     * The model ID.
     *
     * @var int
     */
    protected $ID;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected string $table;

    /**
     * The primary key column name.
     *
     * @var string
     */
    protected string $primaryKey;

    /**
     * The model attributes.
     *
     * @var array
     */
    protected array $attributes = [];

    /**
     * The model attributes map.
     *
     * @var array
     */
    protected array $mapAttributes = [];

    /**
     * Constructor.
     *
     * @param  array $attributes
     * @return void
     */
    public function __construct($model)
    {
        $this->attributes = get_object_vars($model);

        $this->ID = $model->{$this->primaryKey};
    }

    /**
     * Returns a fresh instance of the model.
     *
     * @return $this
     */
    public function fresh()
    {
        return static::find($this->ID);
    }

    /**
     * Search for a record by its primary key.
     *
     * @static
     *
     * @param  mixed  $record
     * @return \Poosly\Modely\Model
     */
    abstract public static function find($record);

    /**
     * Creates a new record and store in database.
     *
     * @static
     *
     * @param  array  $attributes
     * @return \Poosly\Modely\Model
     */
    abstract public static function create(array $attributes);

    /**
     * Updates the record and store in database.
     *
     * @param  array  $attributes
     * @return \Poosly\Modely\Model
     */
    abstract public function update(array $attributes);

    /** 
     * Getter.
     * 
     * @return mixed
     */
    public function __get($key)
    {
        if (in_array($key, ['id', 'ID'])) {
            return $this->ID;
        }
    }
}
