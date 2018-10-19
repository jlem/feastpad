@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Meal Plan for ' . $mealplan->getDate()) }}</div>
                    <div class="card-body">
                        <h2>Recipes</h2>
                        @foreach($mealplan->recipes as $recipe)
                            <div>{{ $recipe->name }}</div>
                        @endforeach

                        <h2>Shopping List</h2>
                        @foreach($mealplan->getIngredients() as $ingredient)
                            <div>{{ $ingredient->name }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
