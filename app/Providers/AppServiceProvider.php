<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade; // 👈 Pastikan baris ini ada

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
        try {
            View::share('setting', Setting::first()); //
        } catch (\Exception $e) {
            // Database not ready
        }

        // 👈 TAMBAHKAN DUA BARIS INI AGAR X-GUEST DAN X-APP DIKENALI:
        Blade::component('layouts.guest', 'guest');
        Blade::component('layouts.app', 'app');
    }
}