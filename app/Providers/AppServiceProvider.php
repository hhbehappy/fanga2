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
        View::share('fanzagenres', SideBarRandomOrder::fanzaGenre());
        View::share('fanzaactresss', SideBarRandomOrder::fanzaSideBar('actress'));
        View::share('fanzamakers', SideBarRandomOrder::fanzaSideBar('maker'));
        View::share('fanzaseriess', SideBarRandomOrder::fanzaSideBar('series'));
        View::share('dugacategorys', SideBarRandomOrder::dugaCategory());
        View::share('dugaperformers', SideBarRandomOrder::dugaSideBar('performer'));
        View::share('dugamakers', SideBarRandomOrder::dugaSideBar('maker'));
        View::share('dugaseriess', SideBarRandomOrder::dugaSideBar('series'));
    }
}