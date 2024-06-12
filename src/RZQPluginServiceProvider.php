<?php

namespace RzqApplication\Plugin;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Http\Kernel;
use RzqApplication\Plugin\Http\Middleware\RZQAuthMiddleware;

class RZQPluginServiceProvider extends ServiceProvider
{
    public function register()
    {
       
    }

    public function boot(Kernel $kernel)
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $router = $this->app->make(Router::class);
        $kernel->appendMiddlewareToGroup('web', RZQAuthMiddleware::class);
        $router->aliasMiddleware('rzq-auth', RZQAuthMiddleware::class);
      
    }
}
