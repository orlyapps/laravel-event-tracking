<?php

namespace Orlyapps\LaravelEventTracking;

use Illuminate\Support\Facades\Route;
use Orlyapps\LaravelEventTracking\Http\Controllers\EventController;

class LaravelEventTracking
{
    public static function routes()
    {
        Route::resource('events', EventController::class)->only('store')->middleware(config('laravel-event-tracking.middleware'));
    }
}
