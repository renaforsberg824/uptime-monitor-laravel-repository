<?php

namespace Spatie\UptimeMonitor\Test\Integration;

use Illuminate\Support\Collection;
use Spatie\UptimeMonitor\Models\Enums\UptimeStatus;
use Spatie\UptimeMonitor\Models\Monitor;
use Spatie\UptimeMonitor\MonitorRepository;
use Spatie\UptimeMonitor\Test\TestCase;
use Spatie\Url\Url;

class SiteRepositoryTest extends TestCase
{
    /** @test */
    public function setUp()
    {
        parent::setUp();
    }

    /** @test */
    public function it_can_get_all_sites_that_are_down()
    {
        Monitor::create(['url' => 'http://down1.com', 'uptime_status' => UptimeStatus::DOWN]);

        Monitor::create(['url' => 'http://up.com', 'uptime_status' => UptimeStatus::UP]);

        Monitor::create(['url' => 'http://down2.com', 'uptime_status' => UptimeStatus::DOWN]);

        $downSites = MonitorRepository::failingMonitors();

        $this->assertEquals(['http://down1.com', 'http://down2.com'], $this->getSiteUrls($downSites));
    }

    protected function getSiteUrls(Collection $monitors)
    {
        return $monitors
            ->pluck('url')
            ->map(function (Url $url) {
                return trim($url, '/');
            })
        ->toArray();
    }
}
