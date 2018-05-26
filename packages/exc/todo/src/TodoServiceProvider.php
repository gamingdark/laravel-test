<?php

namespace Exc\Todo;

use Illuminate\Support\ServiceProvider;

class TodoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/api.php');
        $this->loadRoutesFrom(__DIR__.'/routes/routes.php');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'todo');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Exc\Todo\Controllers\TodoController');
        $this->app->make('Exc\Todo\Controllers\ApiController');
    }
}
