<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Permission;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
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

        
        Gate::before(function($user) {

            $permissions =  Permission::get()->all();

            foreach ($permissions as $permission) {

                Gate::define($permission->keyname, function($user) use ($permission) {

                    $user_can = false;

                    $roles = $user->roles()->get();
                    foreach ($roles as $rol){
                        if( $user_can != true ) {
                            $user_can = $rol->hasPermission($permission->keyname);
                        }
                    }

                    return $user_can;

                } );

            }

        });
    
    }
}
