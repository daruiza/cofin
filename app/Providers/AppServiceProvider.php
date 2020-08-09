<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Query\Abstraction\IAuthQuery;
use App\Query\Request\AuthQuery;
use App\Http\Controllers\Auth\AuthController;

use App\Query\Abstraction\ICommerceQuery;
use App\Query\Request\CommerceQuery;
use App\Http\Controllers\Api\CommerceController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IAuthQuery::class,AuthQuery::class);
        $this->app->make(AuthController::class);
        
        $this->app->bind(ICommerceQuery::class,CommerceQuery::class);
        $this->app->make(CommerceController::class);
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
