<?php

namespace Mithuncdas\LaravelCRUD;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class CRUDServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Route::prefix('crud')
        ->middleware('web')
        ->as('crud.')
        ->group(function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        });

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'crud');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/assets' => public_path('crud_assets'),
            ], 'crud-assets');

            $this->publishes([
                __DIR__ . '/../database/migrations/2023_01_01_100000_create_cruds_table.php' =>
                database_path('migrations/' . date('Y_m_d_His', time()) . '_create_cruds_table.php'),
            ], 'migrations');
        }

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}