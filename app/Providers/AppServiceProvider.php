<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Models\FooterSetting;

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
    $locale = Session::get('locale', 'fr');
    App::setLocale($locale);

     view()->composer('*', function ($view) {
        $footer = FooterSetting::first();
        $view->with('footer', $footer);
    });
}
}
