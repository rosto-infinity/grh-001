<?php

namespace App\Providers;

use App\Models\Emploi;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer(['admin.employees.*'], function ($view) {
            $view->with('emplois', Emploi::all());
        });
    }
}
