<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
//use Illuminate\Support\Facades\Blade;//namespace de Blade

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Fix para el maríaDB
        Schema::defaultStringLength(191);
        //Blade::setEchoFormat('e(utf8_encode(%s))');//Aceptar tildes
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
