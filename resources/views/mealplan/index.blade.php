@extends('layouts.resource-page')
@section('header')
    <i class="fas fa-book"></i> Meal Plans
@endsection
@section('body')
    @component('partials.resource-body', ['resourceName' => 'Meal Plans', 'collection' => $mealplans, 'resourceRoute' => 'mealplans'])
    @foreach($mealplans as $mealplan)
        <a class="list-group-item" href="{{ route('mealplans.show', ['id' => $mealplan->id ]) }}">
            {{ $mealplan->getDate() }}
        </a>
    @endforeach
    @endcomponent
@endsection

