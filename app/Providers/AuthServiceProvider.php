<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Policies\CatPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
        Cat::class => CatPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        Gate::define('is-admin',function(User $user){

            return $user->role == "admin";
        });
        Gate::define('is-manager',function(User $user){

            return $user->role == "manager";
        });
        Gate::define('is-instructor',function(User $user){

            return $user->role == "instructor";
        });
        Gate::define('is-regular',function(User $user){

            return $user->role == "regular";
        });
    }
}
