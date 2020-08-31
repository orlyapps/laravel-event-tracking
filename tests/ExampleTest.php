<?php

namespace Orlyapps\LaravelEventTracking\Tests;

use Orchestra\Testbench\TestCase;
use Orlyapps\LaravelEventTracking\LaravelEventTrackingServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [LaravelEventTrackingServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
