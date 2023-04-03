<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Middleware\OnlineUsersMiddleware;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['router']->pushMiddlewareToGroup('web', OnlineUsersMiddleware::class);
        view()->composer('partials._footer', function ($view) {
            $onlineUsersCount = app('App\Http\Controllers\FooterController')->getOnlineUsersCount();
            $view->with('onlineUsersCount', $onlineUsersCount);
        });
    }
}
