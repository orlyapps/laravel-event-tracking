<?php

namespace Orlyapps\LaravelEventTracking\Tests;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Orchestra\Testbench\TestCase as Orchestra;
use Orlyapps\LaravelEventTracking\LaravelEventTrackingServiceProvider;
use Orlyapps\LaravelEventTracking\Tests\Models\User;

abstract class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->timestamps();
        });

        $this->artisan('migrate');
    }

    protected function getPackageProviders($app)
    {
        return [LaravelEventTrackingServiceProvider::class];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testing');
        $app['config']->set('database.connections.testing', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        $app['config']->set('auth.providers.users.model', User::class);
        $app['config']->set('laravel-event-tracking.user_model', User::class);
        $app['config']->set('laravel-event-tracking.middleware', ['api']);
    }

    protected function createUser(array $attributes = []): User
    {
        return User::create(array_merge([
            'name' => 'Test',
            'email' => 'test+' . uniqid() . '@example.com',
            'password' => bcrypt('secret'),
        ], $attributes));
    }
}
