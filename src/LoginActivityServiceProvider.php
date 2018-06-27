<?php

namespace Mahfuz\LoginActivity;

use Illuminate\Support\ServiceProvider;

class LoginActivityServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        $this->loadViewsFrom(__DIR__.'/views', 'login-activity');

        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        $this->publishes([
            __DIR__.'/views' => resource_path('views/vendor/login-activity'),
        ]);

        $this->publishes([
            __DIR__.'/config/login-activity.php' => config_path('login-activity.php')
        ], 'config');

        $this->publishes([
            __DIR__.'/database/migrations' => database_path('migrations')
        ], 'migrations');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/login-activity.php', 'login-activity');
    }

}