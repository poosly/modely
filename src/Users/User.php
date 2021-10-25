<?php

namespace Poosly\Modely\Users;

use Poosly\Modely\Model;
use WP_Query;

class User extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected string $table = 'users';

    /**
     * The primary key column name.
     *
     * @var string
     */
    protected string $primaryKey = 'ID';

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
     * Search for a user by its ID, slug, email, login.
     *
     * @static
     * @todo
     *
     * @param  mixed  $record
     * @return \Poosly\Modely\User
     */
    public static function find($id)
    {
        return new static(get_userdata($id));
    }

    /**
     * Creates a new record and store in database.
     *
     * @static
     *
     * @param  array  $attributes
     * @return \Poosly\Modely\Post
     */
    public static function create(array $attributes = [])
    {
    }

    /**
     * Updates the record and store in database.
     *
     * @param  array  $attributes
     * @return \Poosly\Modely\Model
     */
    public function update(array $attributes)
    {

    }

    /**
     * Returns a WP_Query for posts belonging to the user.
     *
     * @param  string $postType
     * @return \WP_Query
     */
    public function hasManyPosts(string $class)
    {
        return new WP_Query([
            'post_type'   => $class::POST_TYPE,
            'post_author' => $this->ID
        ]);
    }
}
