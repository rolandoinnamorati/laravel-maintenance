<?php

namespace Rolandoinnamorati\Maintenance;

use Illuminate\Support\ServiceProvider;
use Rolandoinnamorati\Maintenance\commands\PublishMaintenance;

class MaintenanceServiceProvider extends ServiceProvider
{
    protected $defer = false;

    public function boot()
    {

    }

    public function register()
    {
        $this->app->singleton('laravel-maintenance:publish', function($app){
            return new PublishMaintenance();
        });

        $this->commands([
            'laravel-maintenance:publish'
        ]);
    }
}