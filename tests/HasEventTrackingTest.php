<?php

namespace Orlyapps\LaravelEventTracking\Tests;

use Orlyapps\LaravelEventTracking\Models\EventTracking;

class HasEventTrackingTest extends TestCase
{
    public function test_track_persists_an_event_for_the_user(): void
    {
        $user = $this->createUser();

        $user->track('first_login');

        $this->assertDatabaseCount('events', 1);
        $this->assertDatabaseHas('events', [
            'user_id' => $user->id,
            'name' => 'first_login',
        ]);
    }

    public function test_track_stores_meta_as_json_and_casts_back_to_object(): void
    {
        $user = $this->createUser();

        $user->track('purchase', ['sku' => 'ABC-123', 'amount' => 42]);

        $event = EventTracking::first();

        $this->assertSame('purchase', $event->name);
        $this->assertIsObject($event->meta);
        $this->assertSame('ABC-123', $event->meta->sku);
        $this->assertSame(42, $event->meta->amount);
    }

    public function test_track_allows_null_meta(): void
    {
        $user = $this->createUser();

        $user->track('opened_app');

        $this->assertDatabaseHas('events', [
            'user_id' => $user->id,
            'name' => 'opened_app',
            'meta' => null,
        ]);
    }

    public function test_user_has_many_events(): void
    {
        $user = $this->createUser();

        $user->track('a');
        $user->track('b');
        $user->track('c');

        $this->assertCount(3, $user->events()->get());
    }

    public function test_events_belong_to_user(): void
    {
        $user = $this->createUser();
        $user->track('hello');

        $event = EventTracking::first();

        $this->assertTrue($event->user->is($user));
    }
}
