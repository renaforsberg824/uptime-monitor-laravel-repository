<?php

namespace Spatie\UptimeMonitor\Test\Events;

use Artisan;
use Spatie\UptimeMonitor\Events\SiteUp;
use Spatie\UptimeMonitor\Models\Enums\UptimeStatus;
use Spatie\UptimeMonitor\Models\Site;
use Event;
use Spatie\UptimeMonitor\SiteRepository;
use Spatie\UptimeMonitor\Test\TestCase;

class SiteUpTest extends TestCase
{
    protected $site;

    public function setUp()
    {
        parent::setUp();

        Event::fake();

        $this->site = Site::create([
            'url' => 'http://localhost:8080',
            'uptime_status' => UptimeStatus::UP,
            'enabled' => 1,
        ]);
    }

    /** @test */
    public function it_will_fire_the_up_event_when_a_site_is_up()
    {
        SiteRepository::getAllForUptimeCheck()->checkUptime();

        Event::assertFired(SiteUp::class, function ($event) {
            return $event->site->id === $this->site->id;
        });

    }
}