<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Route;
use Illuminate\Pagination\Paginator;
use Nette\Schema\Schema as SchemaSchema;

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
    
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        Route::resourceVerbs([
            'create' => 'crear',
            'edit' => 'editar'
        ]);
    }
}
