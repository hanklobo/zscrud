<?php

namespace Hanklobo\ZSCRUD\Providers;

use Hanklobo\ZSCRUD\Commands\CrudPublish;
use Hanklobo\ZSCRUD\ZSCRUD;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ZSCRUDServiceProvider extends ServiceProvider
{
    protected $defer = true;
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

        $this->app->booted(function () {
            $this->registerRoutes();
        });
    }

    protected function registerRoutes()
    {
        Route::group([
            'middleware' => 'web',
            'namespace' => 'Hanklobo\ZSCRUD\Http\Controllers',
        ], function () {
            Route::get('/', 'PageController@landing')->name('home');
            Route::get('/dashboard', 'PageController@dashboard')
                ->middleware(['auth', 'verified'])
                ->name('dashboard');
            Route::get('/profile', 'PageController@editUser')->name('profile.edit');
        });
    }
}
