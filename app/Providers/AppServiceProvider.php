<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

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
        Gate::define('admin', function(User $user) {
            return $user->user_role_id === 1;
        });
        Gate::define('mentor', function(User $user) {
            return $user->user_role_id === 2;
        });
        Gate::define('member', function(User $user) {
            return $user->user_role_id === 3;
        });
    }
}
