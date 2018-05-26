<?php

namespace Exc\Weather;

use Illuminate\Support\ServiceProvider;
use Illuminate\Console\Scheduling\Schedule;

class WeatherServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/routes.php');
        
        $this->loadViewsFrom(__DIR__.'/resources/views', 'weather');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        
        $this->app->booted(function () {
            $schedule = app(Schedule::class);
            $schedule->command('weather:notify')->everyTenMinutes();
        });
        
        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\SendNotifications::class,
            ]);
        }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Exc\Weather\Controllers\WeatherController');
    }
}
