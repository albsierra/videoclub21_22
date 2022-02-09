<?php

namespace App\Providers;

use App\Models\Movie;
use App\Policies\PeliculaPolicy;
use App\Policies\DirectorPolicy;

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
        //'App\Models\Model' => 'App\Policies\ModelPolicy',
        Movie::class => PeliculaPolicy::class,
        Movie::class => DirectorPolicy::class,
        //'App\Models\Model' => 'App\Policies\PeliculaPolicy',
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
    }
}
