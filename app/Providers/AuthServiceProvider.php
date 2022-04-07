<?php

namespace App\Providers;

use App\Models\Permission;
use App\Models\User;
//use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        App\Post::class => \App\Policies\PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        /*
        $this->registerPolicies();
        $permissions = Permission::all();
        foreach ($permissions as $permission) {
            Gate::define($permission->name,
                function (User $user) use ($permission) {
                    return $user->hasPermission($permission);
                }
            );
        }
        */
    }
}
