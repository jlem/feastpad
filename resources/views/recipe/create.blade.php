@extends('layouts.resource-page')
@section('header')
    Add New Recipe
@endsection
@section('body')
    @include('recipe.recipe-form', [
        'recipe_id' => null,
        'recipe_name' => null,
        'recipe_instructions' => null,
        'recipe_ingredients' => null,
        'ingredientOptions' => $ingredientOptions,
        'unitOfMeasureOptions' => $unitOfMeasureOptions
    ])
@endsection
