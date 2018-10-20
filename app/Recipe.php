<?php

namespace App;

use App\Interfaces\Ownable;
use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model implements Ownable
{
    use BelongsToUser;

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class);
    }

    public function mealplans()
    {
        return $this->belongsToMany(Mealplan::class);
    }
}
