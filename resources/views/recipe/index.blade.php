@extends('layouts.resource-page')
@section('header')
    <i class="fas fa-utensils"></i> Recipes
@endsection
@section('body')
    @component('partials.resource-body', ['resourceName' => 'Recipes', 'collection' => $recipes, 'resourceRoute' => 'recipes'])
        @foreach($recipes as $recipe)
            <a class="list-group-item" href="{{ route('recipes.show', ['id' => $recipe->id ]) }}">
                {{ $recipe->name }}
            </a>
        @endforeach
    @endcomponent
@endsection

