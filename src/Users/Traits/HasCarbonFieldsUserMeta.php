<?php

namespace Poosly\Modely\Users\Traits;

trait HasCarbonFieldsUserMeta
{
    /**
     * Retrieve carbon fields meta key.
     *
     * @param  string $key
     * @return mixed
     */
    public function __get($key)
    {
        if ($this->carbonFieldsMeta && ! empty($this->carbonFieldsMeta[$key])) {
            return carbon_get_user_meta($this->ID, $this->carbonFieldsMeta[$key]);
        }

        return parent::__get($key);
    }

    /**
     * Update carbon fields meta value.
     *
     * @param  string $key
     * @param  mixed $value
     * @return mixed
     */
    public function __set($key, $value)
    {
        if ($this->carbonFieldsMeta && ! empty($this->carbonFieldsMeta[$key])) {
            return carbon_set_user_meta($this->ID, $this->carbonFieldsMeta[$key], $value);
        }

        return parent::__set($key, $value);
    }
}
