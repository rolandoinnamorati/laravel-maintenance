<?php

namespace Rolandoinnamorati\Maintenance;

use Illuminate\Support\Facades\Facade;

class LaravelMaintenance extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-maintenance';
    }
}