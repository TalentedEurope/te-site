<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.navbar', function ($view) {
            if (Auth::user() && Auth::user()->isA("company")) {
                $view->with('alertCount', Alert::getUnreadAlertCount(Auth::user()));
            }
        });

        view()->composer('*', function ($view) {
            $view->with('fromApp', \Session::get('app'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'local') {
            if (! empty($providers = config('app.dev_providers'))) {
                foreach ($providers as $provider) {
                    $this->app->register($provider);
                }
            }

            if (! empty($aliases = config('app.dev_aliases'))) {
                foreach ($aliases as $alias => $facade) {
                    $this->app->alias($alias, $facade);
                }
            }
        }
    }
}
