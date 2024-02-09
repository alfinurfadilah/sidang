<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
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
     */
    public function boot()
    {
        $this->registerPolicies();
        //Mengatur Hak Akses untuk Admin
        Gate::define('user-only', function ($user) {
        if ($user->divisi == 'user'){
        return true;
        }
        return false;
        });
        // //Mengatur Hak Akses untuk apoteker
        Gate::define('Admin-only', function ($user) {
        if ($user->divisi == 'Admin'){
        return true;
        }
        return false;
        });
        //Mengatur Hak Akses untuk gudang
        Gate::define('NOC-only', function ($user) {
        if ($user->divisi == 'NOC'){
        return true;
        }
        return false;
        });   
        //  //Mengatur Hak Akses untuk Pemilik
         Gate::define('Teknisi-only', function ($user) {
            if ($user->divisi == 'Teknisi'){
            return true;
            }
            return false;
            });   
    }  
}