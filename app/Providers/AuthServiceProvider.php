<?php

namespace App\Providers;
use Illuminate\Contracts\Auth\Access\Gate as GateContract; 
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
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);
$gate->define('update-place', function ($user, $place) {
            return $user->email==='jaffar@xys.xyz';//just for time being and you can insert your own logic here
        });
        //
    }
}
