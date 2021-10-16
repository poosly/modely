<?php

namespace Poosly\Modely;

use Poosly\Modely\Traits\HasPostMeta;
use WP_Post;

class Post extends Model
{
    use HasPostMeta;

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
     * The post metas.
     *
     * @var array
     */
    protected array $metas = [
        'internal' => [
            'template' => '_wp_page_template',
        ],
    ];

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
