<?php

namespace Poosly\Modely;

abstract class Model
{
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
     * Search for a record by its primary key.
     *
     * @static
     *
     * @param  mixed  $record
     * @return \Poosly\Modely\Model
     */
    abstract public static function find($record);
}
