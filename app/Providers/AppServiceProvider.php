<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Query\Abstraction\IAuthQuery;
use App\Query\Request\AuthQuery;
use App\Http\Controllers\Auth\AuthController;

use App\Query\Abstraction\ICommerceQuery;
use App\Query\Request\CommerceQuery;
use App\Http\Controllers\Api\CommerceController;

use App\Query\Abstraction\IInvoiceQuery;
use App\Query\Request\InvoiceQuery;
use App\Http\Controllers\Api\InvoiceController;

use App\Query\Abstraction\ICustomerQuery;
use App\Query\Request\CustomerQuery;
use App\Http\Controllers\Api\CustomerController;

use App\Query\Abstraction\IPayuPaymentQuery;
use App\Query\Request\PayuPaymentQuery;
use App\Http\Controllers\Api\PayuPaymentController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IAuthQuery::class, AuthQuery::class);
        $this->app->make(AuthController::class);
        
        $this->app->bind(ICommerceQuery::class, CommerceQuery::class);
        $this->app->make(CommerceController::class);

        $this->app->bind(IInvoiceQuery::class, InvoiceQuery::class);
        $this->app->make(InvoiceController::class);

        $this->app->bind(ICustomerQuery::class, CustomerQuery::class);
        $this->app->make(CustomerController::class);        

        $this->app->bind(IPayuPaymentQuery::class, PayuPaymentQuery::class);
        $this->app->make(PayuPaymentController::class);        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // boot
    }
}
