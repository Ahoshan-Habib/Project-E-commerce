<?php

namespace App\Providers;
use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use View;

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
       View::share('categories',$categories=Category::all());
       Schema::defaultStringLength(191);
    }
}
