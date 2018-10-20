<?php

namespace App\Providers;

use App\Ingredient;
use App\Mealplan;
use App\Policies\OwnershipPolicy;
use App\Recipe;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Recipe::class => OwnershipPolicy::class,
        Ingredient::class => OwnershipPolicy::class,
        Mealplan::class => OwnershipPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
