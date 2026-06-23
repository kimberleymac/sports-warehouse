<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        // This creates a blade directive where we can use @adminOnly where it will check whether the user is
        // both logged in and also has the admin role
        Blade::directive('adminOnly', function(){
            // if the user is logged in && the user has admin role
            return "<?php if(auth()->check() && auth()->user()->isAdmin()): ?>";
        });

        Blade::directive('endAdminOnly', function(){
            return "<?php endif; ?>";
        });
    
    }
}
