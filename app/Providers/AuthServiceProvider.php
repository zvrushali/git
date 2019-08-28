<?php

namespace App\Providers;
<<<<<<< HEAD
use Laravel\Passport\Passport;  
=======

>>>>>>> d1cb5ffb453ba83f73b8ec0964c6d505c698d739
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
<<<<<<< HEAD
        'App\Model' => 'App\Policies\ModelPolicy',
=======
        // 'App\Model' => 'App\Policies\ModelPolicy',
>>>>>>> d1cb5ffb453ba83f73b8ec0964c6d505c698d739
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
<<<<<<< HEAD
         $this->registerPolicies();
         Passport::routes(); 
=======
        $this->registerPolicies();
>>>>>>> d1cb5ffb453ba83f73b8ec0964c6d505c698d739

        //
    }
}
