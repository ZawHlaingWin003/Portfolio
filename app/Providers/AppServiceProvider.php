<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        $path = resource_path('views/frontend/components/');
        $files = glob($path . '/*.blade.php');

        foreach ($files as $file) {
            $componentName = basename($file, '.blade.php');
            $componentViewPath = "frontend.components.$componentName";
            Blade::component($componentViewPath, $componentName);
        }
    }
}
