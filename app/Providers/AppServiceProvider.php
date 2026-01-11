<?php

namespace App\Providers;

use App\Models\Customer;
use App\Models\User;
use App\Policies\CustomerPolicy;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
         Paginator::useBootstrapFive();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define("customerEdit",function(User $user){
            return $user->role_id == 6 || $user->id == 223;
        });

       Gate::policy( Customer::class, CustomerPolicy::class);
    }
}
