@extends('layouts.resource-page')
@section('header')
    {{ $recipe->name }}
@endsection
@section('body')
    <h2>Ingredients</h2>
    @foreach($recipe->ingredients as $ingredient)
        <div class="list-group-item">
            {{ $ingredient->quantity }} {{ $ingredient->getUnitsLabel() }} {{ $ingredient->ingredient->name }}
        </div>
    @endforeach

    <h2 class="mt-3">Instructions</h2>
    <div class="card">
        <div class="card-body">
            {!!  nl2br(e($recipe->instructions)) !!}
        </div>
    </div>
    <a class="button button--primary d-block w-100 mt-3" href="{{ route('recipes.edit', ['id' => $recipe->id]) }}">
        <i class="fas fa-pencil-alt"></i> Edit Recipe
    </a>
    <form method="POST" action="{{ route('recipes.destroy', ['id' => $recipe->id]) }}">
        @method('DELETE')
        @csrf
        <button class="button button--ghost w-100 mt-5" type="submit"><i class="far fa-trash-alt"></i> Delete Recipe</button>
    </form>
@endsection

