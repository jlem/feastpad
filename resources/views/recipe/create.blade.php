@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Recipe') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('recipes.store') }}">
                            @csrf
                            @include('recipe.form', [
                                'name' => null,
                                'instructions' => null,
                                'ingredientOptions' => $ingredientOptions,
                                'recipeIngredients' => null
                            ])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
