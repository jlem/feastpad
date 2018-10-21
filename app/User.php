<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @property \Illuminate\Support\Collection $ingredients
 * @property \Illuminate\Support\Collection $recipes
 * @property \Illuminate\Support\Collection $mealplans
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }

    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }

    public function mealplans()
    {
        return $this->hasMany(Mealplan::class);
    }
}
