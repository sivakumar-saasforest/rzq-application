<?php

namespace RzqApplication\Plugin;

use Illuminate\Support\ServiceProvider;

class RZQPluginServiceProvider extends ServiceProvider
{
  public function register()
  {
    $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'rzqpackage');
  }

  public function boot()
  {
    if ($this->app->runningInConsole()) {

        $this->publishes([
          __DIR__.'/../config/config.php' => config_path('rzqpackage.php'),
        ], 'config');
    
      }
  }
}