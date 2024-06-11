<?php

namespace RzqApplication\Plugin;

use Illuminate\Support\ServiceProvider;

class RZQPluginServiceProvider extends ServiceProvider
{
    public function register()
    {
        // $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'rzqpackage');
        // $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // $this->app->bind('task', function () {
        //     return new Task();
        // });
        // if ($this->app->runningInConsole()) {

        //     $this->publishes([
        //         __DIR__ . '/../config/config.php' => config_path('rzqpackage.php'),
        //     ], 'config');

        //     // Export the migration
        //     if (!class_exists('CreatePlansTable')) {
        //         $this->publishes([
        //             __DIR__ . '/../database/migrations/create_plans_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_plans_table.php'),
        //         ], 'migrations');
        //     }

        //     if (!class_exists('CreateShopsTable')) {
        //         $this->publishes([
        //             __DIR__ . '/../database/migrations/create_shops_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_shops_table.php'),
        //         ], 'migrations');
        //     }

        //     if (!class_exists('CreateChargesTable')) {
        //         $this->publishes([
        //             __DIR__ . '/../database/migrations/create_charges_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_charges_table.php'),
        //         ], 'migrations');
        //     }
        // }
    }
}
