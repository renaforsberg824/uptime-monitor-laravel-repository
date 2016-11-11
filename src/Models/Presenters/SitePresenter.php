<?php

namespace Spatie\UptimeMonitor\Models\Presenters;

use Spatie\UptimeMonitor\Helpers\Emoji;
use Spatie\UptimeMonitor\Models\Enums\UptimeStatus;

trait SitePresenter
{
    public function getReachableAsEmojiAttribute(): string
    {
        return ($this->uptime_status === UptimeStatus::UP) ? Emoji::ok() : Emoji::notOk();
    }

    public function getFormattedLastUpdatedStatusChangeDateAttribute(): string
    {
        return $this->formatDate('last_uptime_status_change_on');
    }

    public function getFormattedSslCertificateExpirationDateAttribute(): string
    {
        return $this->formatDate('ssl_certificate_expiration_date');
    }

    public function getChunkedLastFailureReasonAttribute(): string
    {
        if ($this->last_failure_reason == '') {
            return '';
        }

        return chunk_split($this->last_failure_reason, 15, "\n");
    }

    protected function formatDate(string $attributeName): string
    {
        if (! $this->$attributeName) {
            return '-';
        }

        return $this->$attributeName->diffForHumans();
    }
}