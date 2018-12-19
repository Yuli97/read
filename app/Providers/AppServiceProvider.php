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
            return preg_match('/([0-9]){10}00[0-9]/', $value);
        });
    }
}
