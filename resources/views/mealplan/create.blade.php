@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Meal Plan') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('mealplans.store') }}">
                            @csrf
                            @include('mealplan.form', ['selectedRecipes' => [], 'allRecipes' => $allRecipes])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
