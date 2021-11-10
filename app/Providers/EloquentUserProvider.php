<?php

namespace App\Providers;

use Illuminate\Auth\EloquentUserProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class EloquentUserProvider extends ServiceProvider
{
    protected function newModelQuery($model = null)
    {
        return parent::newModelQuery($model)->withTrashed();
    }
}
