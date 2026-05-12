<?php

namespace Orlyapps\LaravelEventTracking\Tests\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Orlyapps\LaravelEventTracking\Traits\HasEventTracking;

class User extends Authenticatable
{
    use HasEventTracking;

    protected $table = 'users';

    protected $guarded = [];
}
