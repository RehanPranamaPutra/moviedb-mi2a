<?php

namespace App\Providers;

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
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        
        // Policy untuk akses role admin ke laravel
        Gate::define('delete', function($user){
            return $user->role === 'admin';
        });

        Gate::define('edit', function($user){
            return $user->role === 'admin';
        });
    }
}
