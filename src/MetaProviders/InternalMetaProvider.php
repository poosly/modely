<?php

namespace Poosly\Modely\MetaProviders;

class InternalMetaProvider
{
    /**
     * Get a post meta field for the given post ID.
     *
     * @see get_post_meta
     *
     * @param  int     $id
     * @param  string  $metaKey
     * @return mixed
     */
    public function getPostMeta($id, $metaKey)
    {
        return get_post_meta($id, $metaKey);
    }

    /**
     * Get a term meta field for the given term ID.
     *
     * @see get_term_meta
     *
     * @param  int     $id
     * @param  string  $metaKey
     * @return mixed
     */
    public function getTermMeta($id, $metaKey)
    {
        return get_term_meta($id, $metaKey);
    }

    /**
     * Get a user meta field for the given user ID.
     *
     * @see get_user_meta
     *
     * @param  int     $id
     * @param  string  $metaKey
     * @return mixed
     */
    public function getUserMeta($id, $metaKey)
    {
        return get_user_meta($id, $metaKey);
    }
}
