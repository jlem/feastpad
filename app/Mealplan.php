<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mealplan extends Model
{
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
