@extends('layouts.resource-page')
@section('header')
    Edit {{ $recipe->name }}
@endsection
@section('body')
    @include('recipe.recipe-form', [
        'recipe_id' => $recipe->id,
        'recipe_name' => $recipe->name,
        'recipe_instructions' => $recipe->instructions,
        'recipe_ingredients' => $recipe->ingredients,
        'ingredientOptions' => $ingredientOptions,
        'unitOfMeasureOptions' => $unitOfMeasureOptions
    ])
@endsection

