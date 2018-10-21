@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="col-md-auto w-md-600">
            @include('page-partials.mealplan-details', ['mealplan' => $mealplan])
        </div>
    </div>
@endsection
