@extends('layouts.resource-page')
@section('header')
    {{ $recipe->name }}
@endsection
@section('body')
    <h2>Ingredients</h2>
    @foreach($recipe->ingredients->sortBy('name')->values() as $ingredient)
        <div class="list-group-item">
            {{ $ingredient->name }}
        </div>
    @endforeach

    <h2 class="mt-5">Instructions</h2>
    <div class="card">
        <div class="card-body">
            {!!  nl2br(e($recipe->instructions)) !!}
        </div>
    </div>
    <a class="button button--primary d-block w-100 mt-5" href="{{ route('recipes.edit', ['id' => $recipe->id]) }}">
        <i class="fas fa-pencil-alt"></i> Edit Recipe
    </a>
@endsection

