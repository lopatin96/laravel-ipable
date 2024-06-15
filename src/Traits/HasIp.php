<?php

namespace Atin\LaravelIpable\Traits;

use Illuminate\Database\Eloquent\Model;

trait HasIp
{
    public function scopeWithIpAddress($query, ?string $ipAddress = null): void
    {
        $query->where('ip', $ipAddress ?? request()?->ip());
    }

    public static function bootHasIp(): void
    {
        static::creating(static function (Model $model) {
            if (is_null($model->ip_address)) {
                $model->ip_address = request()?->ip();
            }
        });
    }
}