<?php

namespace Poosly\Modely\Relations;

class HasManyPosts
{
    /**
     * WP_Query arguments.
     *
     * @var array
     */
    protected $wpQueryArguments = [];

    /**
     * Constructor.
     *
     * @param  string $modelClass
     * @param  array  $args
     * @return void
     */
    public function __construct($modelClass, $args = [])
    {
        $this->wpQueryArguments = array_merge([
            'post_type' => $modelClass,
        ], $args);
    }
}
