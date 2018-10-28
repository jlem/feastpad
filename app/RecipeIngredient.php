<?php

namespace App;

use App\Enums\UnitOfMeasure;
use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Model;

class RecipeIngredient extends Model
{
    use BelongsToUser;

    protected $table = 'recipe_ingredients';

    protected $fillable = [
        'quantity',
        'units',
        'ingredient_id',
        'recipe_id'
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }

    public function getUnitsLabel()
    {
        return (new UnitOfMeasure($this->units))->toString();
    }
}
