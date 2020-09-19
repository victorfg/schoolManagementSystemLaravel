<?php

namespace App\Providers;

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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('canAccessToAdminPage', function ($user) {
            return $user->type==1;
        });
        Gate::define('canAccessToTeacherPage', function ($user) {
            return $user->type==2;
        });
        Gate::define('canAccessToStudentPage', function ($user) {
            return $user->type==3;
        });
    }
}
