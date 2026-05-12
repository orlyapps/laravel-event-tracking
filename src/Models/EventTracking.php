<?php

namespace Orlyapps\LaravelEventTracking\Models;

use Illuminate\Database\Eloquent\Model;

class EventTracking extends Model
{
    protected $table = 'events';

    public $fillable = [
        'name', 'meta',
    ];

    protected $casts = [
        'meta' => 'object',
    ];

    public function user()
    {
        return $this->belongsTo(config('laravel-event-tracking.user_model', \App\Models\User::class));
    }
}
