<?php

namespace Atin\LaravelIpable\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

trait HasIp
{
    public static function bootHasIp(): void
    {
        static::creating(static function (Model $model) {
            if (is_null($model->ip)) {
                $model->ip = Request::ip();
            }
        });
    }
}