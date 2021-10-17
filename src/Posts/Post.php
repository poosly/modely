<?php

namespace Poosly\Modely\Posts;

use Poosly\Modely\Model;
use Poosly\Modely\Posts\Traits\HasPostMeta;
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
     * The model attributes map.
     *
     * @var array
     */
    protected array $mapAttributes = [
        'id' => 'ID',
        'title' => 'post_title',
        'content' => 'post_content',
        'slug' => 'post_name',
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
        $args = wp_parse_args($data, [
            'post_title' => date('Y-m-d H:i:s'),
            'post_content' => '',
            'post_type' => static::POST_TYPE,
            'post_status' => 'publish',
            'meta_input' => [],
        ]);

        $id = wp_insert_post($args);

        return (static::find($id));
    }
}
