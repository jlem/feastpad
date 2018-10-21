@extends('layouts.resource-page')
@section('header')
    Add New Ingredient
@endsection
@section('body')
    <form class="form" method="POST" action="{{ route('ingredients.store') }}">
        @csrf
        @include('ingredient.form', ['name' => null])
    </form>
@endsection
