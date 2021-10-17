<?php

namespace Poosly\Modely\Terms;

use Poosly\Modely\Model;

class Term extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected string $table = 'terms';

    /**
     * The primary key column name.
     *
     * @var string
     */
    protected string $primaryKey = 'term_id';

    /**
     * The name of the taxonomy.
     *
     * @var string
     */
    const TAXONOMY = 'category';

    /**
     * Search for a user by its ID or WP_Post.
     *
     * @static
     *
     * @param  int|WP_Post  $record
     * @return \Poosly\Modely\Post
     */
    public static function find($record)
    {
        $wp_term = get_term($record, static::TAXONOMY);

        if (! $wp_term) {
            return null;
        }

        return (new static($wp_term));
    }

    /**
     * Creates a new record and store in database.
     *
     * @static
     *
     * @param  array  $attributes
     * @return \Poosly\Modely\Post
     */
    public static function create(array $data = [])
    {
    }
}
