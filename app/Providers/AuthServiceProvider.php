<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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

    // protected  $rol_user;
    // function __construct() {
    //     $this->rol_user = (Auth::user()->rol == "Adinistrador" ? true : false);
    // }




    public function boot(){
        $this->registerPolicies();

        Gate::define('can_employee_view', function (User $user){ return $user->rol == "Administrador";  });
        Gate::define('can_employee_create', function (User $user){ return $user->rol == "Administrador";  });
        Gate::define('can_employee_edit', function (User $user){ return $user->rol == "Administrador";  });
        Gate::define('can_employee_delete', function (User $user){ return $user->rol == "Administrador";  });
    }
}
