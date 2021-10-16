<?php

namespace Poosly\Modely\Traits;

trait HasPostMeta
{
    /**
     * Get the meta attribute.
     *
     * @todo Add support for more meta providers.
     *
     * @param  string  $key
     * @return mixed
     */
    public function getMetaAttribute($key)
    {
        $metas = array_merge(...array_values($this->metas));

        if (! isset($metas[$key])) {
            return null;
        }

        foreach ($this->metas as $metaProvider => $metas) {
            if (! isset($metas[$key])) {
                continue;
            }

            if ($metaProvider === 'internal') {
                return get_post_meta($this->ID, $metas[$key], true);
            }
        }

        return null;
    }
}
