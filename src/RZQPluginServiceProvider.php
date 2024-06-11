<?php

namespace RzqApplication\Plugin;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use RzqApplication\Plugin\Http\Middleware\RZQAuthMiddleware;

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
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('rzq-auth', RZQAuthMiddleware::class);
      
    }

    // public function boot()
    // {
    //     // ... other things
    //     $this->registerRoutes();
    // }

    // protected function registerRoutes()
    // {
    //     Route::group($this->routeConfiguration(), function () {
    //         $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    //     });
    // }

    // protected function routeConfiguration()
    // {
    //     return [
    //         'prefix' => config('blogpackage.prefix'),
    //         'middleware' => config('blogpackage.middleware'),
    //     ];
    // }
}
