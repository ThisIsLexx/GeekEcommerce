<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;

use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //

        Gate::define("navBar", function (User $user){
            // Aquí puede existir otro funcionamiento lógico.	
        Return $user->rol === 'admin';
        });

        Gate::define("loggedIn", function (User $user){
            // Aquí puede existir otro funcionamiento lógico.	
            Return Auth::check();
        });
    }


}
