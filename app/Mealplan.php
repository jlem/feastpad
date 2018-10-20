<?php

namespace App;

use App\Interfaces\Ownable;
use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Model;

class Mealplan extends Model implements Ownable
{
    use BelongsToUser;

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class);
    }

    public function getIngredients()
    {
        return $this->recipes()
            ->with('ingredients')
            ->get()
            ->flatMap(function(Recipe $recipe) {
                return $recipe->ingredients;
            })
            ->unique('id');
    }

    public function getDate()
    {
        return $this->created_at->format('l, F jS  Y');
    }
}
