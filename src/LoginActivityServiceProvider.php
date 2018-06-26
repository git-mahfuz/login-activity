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
    }

    public function register()
    {

    }

}