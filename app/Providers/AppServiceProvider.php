<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Repositories
        $this->app->bind('App\Repositories\Interfaces\IUserRepository', 'App\Repositories\UserRepository');
        $this->app->bind('App\Repositories\Interfaces\IProductRepository', 'App\Repositories\ProductRepository');

        // Services
        $this->app->bind('App\Services\Interfaces\IUserService', 'App\Services\UserService');
        $this->app->bind('App\Services\Interfaces\IProductService', 'App\Services\ProductService');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
