<?php

namespace App\Providers;

use App\Models\Categorie;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
//        View::composer('layouts.sidebar', function ($view) {
//            $view->with(['categories' => Categorie::all()]);
//        });
        View::share(['categories' => Categorie::all()]);
    }
}
