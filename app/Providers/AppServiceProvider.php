<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use View;
use App\Http\Middleware\VerifyCsrfToken;

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
        View::composer(['frontEnd.include.header'], function ($view) {
            $view->with('categories', Category::all());
        });
        $this->app->singleton(\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class, VerifyCsrfToken::class);
    }
}
