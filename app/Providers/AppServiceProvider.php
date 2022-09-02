<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('is_mahasiswa', function ($user) {
            return $user->role === 'mahasiswa';
        });

        Gate::define('is_admin', function ($user) {
            return $user->role === 'admin';
        });
    }
}
