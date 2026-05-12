<?php

namespace Orlyapps\LaravelEventTracking\Tests;

use Illuminate\Support\Facades\Route;
use Orlyapps\LaravelEventTracking\LaravelEventTracking;

class EventControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Route::middleware('api')->prefix('api')->group(function () {
            LaravelEventTracking::routes();
        });
    }

    public function test_authenticated_user_can_store_an_event(): void
    {
        $user = $this->createUser();

        $response = $this->actingAs($user)->postJson('/api/events', [
            'name' => 'first_login',
            'source' => ['code' => 'mobile'],
        ]);

        $response->assertOk()->assertJson(['result' => true]);

        $this->assertDatabaseHas('events', [
            'user_id' => $user->id,
            'name' => 'first_login',
        ]);
    }

    public function test_name_is_required(): void
    {
        $user = $this->createUser();

        $response = $this->actingAs($user)->postJson('/api/events', []);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['name']);
    }

    public function test_routes_helper_registers_only_the_store_action(): void
    {
        $registered = collect(Route::getRoutes())
            ->map(fn ($r) => $r->methods()[0] . ' ' . $r->uri())
            ->values()
            ->all();

        $this->assertContains('POST api/events', $registered);
        $this->assertNotContains('GET api/events', $registered);
        $this->assertNotContains('PUT api/events/{event}', $registered);
        $this->assertNotContains('DELETE api/events/{event}', $registered);
    }
}
