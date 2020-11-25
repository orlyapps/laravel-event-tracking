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
        return $this->belongsTo(\App\User::class);
    }
}
