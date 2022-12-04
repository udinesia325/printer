<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Printer;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

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
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        Gate::define("admin_only", function (User $user) {
            return $user->id === 1; // admin only
        });
        Gate::define("edit_delete", function (User $user, Printer $printer) {
            // allow if admin 
            if ($user->id == 1) return true;
            return $user->id === $printer->user_id;
        });
    }
}
