<?php

namespace Orlyapps\LaravelEventTracking\Http\Controllers;

use Orlyapps\LaravelEventTracking\Http\Requests\EventRequest;

class EventController
{
    public function store(EventRequest $request)
    {
        $request->user()->track($request->name, $request->meta);
        return ['result' => true];
    }
}
