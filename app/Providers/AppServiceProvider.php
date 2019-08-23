<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
<<<<<<< HEAD
use Laravel\Passport\Passport;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];
    public function boot()
    {
         
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
=======

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
        //
>>>>>>> d1cb5ffb453ba83f73b8ec0964c6d505c698d739
    }
}
