<?php

namespace Hanklobo\ZSCRUD\Providers;

use Hanklobo\ZSCRUD\Commands\CrudPublish;
use Hanklobo\ZSCRUD\ZSCRUD;
use Illuminate\Support\ServiceProvider;

class ZSCRUDServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('zscrud', function () {
            return new ZSCRUD();
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/crud.php' => config_path('crud.php'),
        ], 'config');

//        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
//        $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'core');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'zscrud');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');

        if ($this->app->runningInConsole()) {
            $this->commands([
                CrudPublish::class,
            ]);
        }

    }
}
