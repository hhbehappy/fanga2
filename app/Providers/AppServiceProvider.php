<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Services\SideBarRandomOrder;

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
        View::share('fanzagenres', SideBarRandomOrder::fanzagenre());
        View::share('fanzaactresss', SideBarRandomOrder::fanzaactress());
        View::share('fanzamakers', SideBarRandomOrder::fanzamaker());
        View::share('fanzaseriess', SideBarRandomOrder::fanzaseries());
        View::share('dugacategorys', SideBarRandomOrder::dugacategory());
        View::share('dugaperformers', SideBarRandomOrder::dugaperformer());
        View::share('dugamakers', SideBarRandomOrder::dugamaker());
        View::share('dugaseriess', SideBarRandomOrder::dugaseries());
    }
}
