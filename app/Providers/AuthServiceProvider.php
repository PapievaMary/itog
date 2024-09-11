<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('place', function(User $user){
             return $user->role_id == 1 
            ? Response::allow()
            : Response::deny('You don`t administrator');
        });

        Gate::define('transfer', function(User $user){
            return $user->role_id != 1 
           ? Response::allow()
           : Response::deny('You don`t user');
       });

    }
}
