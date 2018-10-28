<?php

namespace App;

use App\Interfaces\Ownable;
use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model implements Ownable
{
    use BelongsToUser;

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class);
    }

    public function recipeIngredients()
    {
        return $this->hasMany(RecipeIngredient::class);
    }
}
