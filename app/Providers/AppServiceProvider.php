<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Category;
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
        View::share('categories', Category::all());
        View::share('womenCategories', Category::where('category_name', 'women')->get());
        View::share('menCategories', Category::where('category_name', 'men')->get());
        View::share('kidsCategories', Category::where('category_name', 'kids')->get());
    }
}
