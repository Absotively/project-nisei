<?php

namespace App\Providers;

use App\Role;
use App\User;
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
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();

        
        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Category
        Gate::define('category_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('category_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('category_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('category_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('category_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: FAQs
        Gate::define('faqs_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('faqs_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('faqs_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('faqs_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('faqs_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });


        // Auth gates for: Blog
        Gate::define('blog_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('blog_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('blog_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('blog_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('blog_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Event management
        Gate::define('event_management_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Events
        Gate::define('event_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('event_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('event_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('event_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('event_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Tournament management
        Gate::define('tournament_management_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: TournamentSets
        Gate::define('tournamentset_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('tournamentset_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('tournamentset_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('tournamentset_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('tournamentset_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Tournaments
        Gate::define('tournament_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('tournament_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('tournament_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('tournament_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('tournament_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Products
        Gate::define('product_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('product_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('product_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('product_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('product_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
    }
}
