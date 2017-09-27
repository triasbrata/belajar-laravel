<?php

namespace App\Providers;

use App\Repository\Post\PostRepositoryEloquent;
use App\Repository\Post\PostRepositoryInterface;
use App\Repository\Role\RoleRepositoryEloquent;
use App\Repository\Role\RoleRepositoryInterface;
use App\Repository\User\UserRepositoryEloquent;
use App\Repository\User\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // \Schema::defaultStringLength(191);
        $this->app->bind(UserRepositoryInterface::class,function ()
        {
            return app(UserRepositoryEloquent::class);
        });
        $this->app->bind(RoleRepositoryInterface::class,function ()
        {
            return app(RoleRepositoryEloquent::class);
        });
         $this->app->bind(PostRepositoryInterface::class,function ()
        {
            return app(PostRepositoryEloquent::class);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}
