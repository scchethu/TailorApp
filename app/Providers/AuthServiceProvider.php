<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
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
        Gate::define('admin', function () {
            if(Auth::check()) {
                return Auth::user()->roles->first()->name == 'admin';
            }
            return  false;

        });
        Gate::define('user', function () {
            if(Auth::check()) {
                return Auth::user()->roles->first()->name == 'user';
            }
            return  false;
        });
        Gate::define('tailor', function () {
            if(Auth::check()) {
                return Auth::user()->roles->first()->name == 'tailor';
            }
            return  false;
        });
//
    }
}
