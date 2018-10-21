@extends('layouts.resource-page')
@section('header')
   <i class="fas fa-bars"></i> Ingredients
@endsection
@section('body')
    @component('partials.resource-body', ['resourceName' => 'Ingredients', 'collection' => $ingredients, 'resourceRoute' => 'ingredients'])
        @foreach($ingredients as $ingredient)
            <a class="list-group-item" href="{{ route('ingredients.show', ['id' => $ingredient->id ]) }}">
                {{ $ingredient->name }}
            </a>
        @endforeach
    @endcomponent
@endsection
