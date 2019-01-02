<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->validaciones();
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

    private function validaciones()
    {
         Validator::extend('ruc', function ($attribute, $value, $parametes) {
             return preg_match('/^([0][1-9]|[1][0-9]|[2][0-4])[0-9]{11}$/', $value);
         });


    }
}
