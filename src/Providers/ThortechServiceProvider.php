<?php

namespace Thortech\Providers;

use App\Repository\Post\PostRepositoryEloquent;
use App\Repository\User\UserRepositoryEloquent;
use App\Repository\User\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class ThorTechServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        //
        // \Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, function () {
            return app(UserRepositoryEloquent::class);
        });
        $this->app->bind(PostRepositoryInterface::class, function () {
            return app(PostRepositoryEloquent::class);
        });
    }
}
