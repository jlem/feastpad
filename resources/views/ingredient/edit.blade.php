@extends('layouts.resource-page')
@section('header')
    Edit Ingredient
@endsection
@section('body')
    <form class="form" method="POST" action="{{ route('ingredients.update', ['id' => $ingredient->id]) }}">
        @method('PUT')
        @csrf
        @include('ingredient.form', ['name' => $ingredient->name])
    </form>
    <form method="POST" action="{{ route('ingredients.destroy', ['id' => $ingredient->id]) }}">
        @method('DELETE')
        @csrf
        <button class="button button--ghost w-100 mt-5" type="submit"><i class="far fa-trash-alt"></i> Delete</button>
    </form>
@endsection

