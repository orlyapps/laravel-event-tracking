<?php

namespace Orlyapps\LaravelEventTracking\Traits;

use Orlyapps\LaravelEventTracking\Models\EventTracking;

/**
 *
 */
trait HasEventTracking
{
    public function events()
    {
        return $this->hasMany(EventTracking::class);
    }

    public function track($eventName, $meta = null)
    {
        $this->events()->save(new EventTracking([
            'name' => $eventName,
            'meta' => $meta,
        ]));
    }
}
