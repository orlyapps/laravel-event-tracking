<?php

namespace Orlyapps\LaravelEventTracking;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Orlyapps\LaravelEventTracking\Skeleton\SkeletonClass
 */
class LaravelEventTrackingFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-event-tracking';
    }
}
