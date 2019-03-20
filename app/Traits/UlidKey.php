<?php

namespace App\Traits;

use Ulid\Ulid;

trait UlidKey
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            try {
                $model->ulid = (string) Ulid::generate();
            } catch (UnsatisfiedDependencyException $e) {
                abort(500, $e->getMessage());
            }
        });
    }
}
