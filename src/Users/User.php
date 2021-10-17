<?php

namespace Poosly\Modely\Users;

use Poosly\Modely\Model;

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
     * Search for a user by its ID, slug, email, login.
     *
     * @static
     * @todo
     *
     * @param  mixed  $record
     * @return \Poosly\Modely\User
     */
    public static function find($record)
    {
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
