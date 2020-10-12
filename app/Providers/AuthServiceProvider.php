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

        Gate::define('canAccessToWeeks', function ($user) {
            return $user->type==3;
        });
        Gate::define('canAdminSubjects', function ($user) {
            return $user->type==1;
        });
        Gate::define('canAdminUsers', function ($user) {
            return $user->type==1;
        });
        Gate::define('canAdminEnrollments', function ($user) {
            return $user->type==1;
        });
        Gate::define('canShowCourses', function ($user) {
            return $user->type==1 || $user->type==2 ;
        });
        Gate::define('canModifyCourses', function ($user) {
            return $user->type==1;
        });
        Gate::define('canShowSchedules', function ($user) {
            return $user->type==1 || $user->type==2 ;
        });
        Gate::define('canModifySchedules', function ($user) {
            return $user->type==1 || $user->type==2 ;
        });
        Gate::define('canShowCoursesSubjects', function ($user) {
            return $user->type==1 || $user->type==2 ;
        });
        Gate::define('canModifyCoursesSubjects', function ($user) {
            return $user->type==1;
        });
    }
}
