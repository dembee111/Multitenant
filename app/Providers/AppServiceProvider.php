<?php

namespace App\Providers;

use App\Http\ViewComposers\NavigationViewComposer;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /* views iin _nav deer navigationViewComposer classiin utgiig shuud zaaj ajiluulna
        ''*/
        View::composer('layouts.partials._nav', NavigationViewComposer::class);
    }
}
