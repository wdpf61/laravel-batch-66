<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\PaymentService;

class PaymentServiceProver extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
       app()->bind("payment", function(){
         return new PaymentService ;
       });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
