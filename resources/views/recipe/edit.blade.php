@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Recipe') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('recipes.update', ['id' => $recipe->id]) }}">
                            @method('PUT')
                            @csrf
                            @include('recipe.form', [
                                'name' => $recipe->name,
                                'instructions' => $recipe->instructions,
                                'ingredientOptions' => $ingredientOptions,
                                'recipeIngredients' => $recipe->ingredients
                            ])
                        </form>
                        <form method="POST" action="{{ route('recipes.destroy', ['id' => $recipe->id]) }}">
                            @method('DELETE')
                            @csrf
                            <button class="button button--ghost w-100 mt-5" type="submit"><i class="far fa-trash-alt"></i> Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
