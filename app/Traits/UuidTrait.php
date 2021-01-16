<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait UuidTrait
{
    protected static function bootUuidTrait(): void
    {
        static::creating(function ($model) {
            if (!$model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }
}
