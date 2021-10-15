<?php

namespace Poosly\Modely;

use WP_Post;

class Post extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected string $table = 'posts';

    /**
     * The primary key column name.
     *
     * @var string
     */
    protected string $primaryKey = 'ID';

    /**
     * The name of the post type.
     *
     * @var string
     */
    const POST_TYPE = 'post';

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
        $wp_post = get_post($record);

        if (! $wp_post) {
            return null;
        }

        return (new static($wp_post));
    }
}
