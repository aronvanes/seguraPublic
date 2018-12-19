<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Carbon\Carbon;

use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('adminOrUser', function ($user, $member) {
            return $user->access_level >= 99 || $user->id == $member['id'];
        });

        Blade::if('admin', function () {
            return Auth::user()->isAdmin();
        });

        Blade::if('active', function () {
            return Auth::user()->isActive();
        });

        Blade::if('beforedeadline', function ($date) {
            return Carbon::now() <= $date;
        });

        Blade::if('management', function () {
            return Auth::user()->access_level >= 66 && Auth::user()->access_level != 88;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
