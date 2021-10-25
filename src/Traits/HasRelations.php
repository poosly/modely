<?php

namespace Poosly\Modely\Traits;

use Poosly\Modely\Relations\HasManyPosts;

trait HasRelations
{
    /**
     * Instantiates a new hasManyPosts relationship.
     *
     * @param  string $modelClass
     * @param  array  $args
     * @return \Poosly\Modely\Relations\HasManyPosts
     */
    public function hasManyPosts($modelClass, $args = [])
    {
        return new HasManyPosts($modelClass, $args);
    }
}
