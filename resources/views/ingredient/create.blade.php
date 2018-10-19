@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Ingredient') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('ingredients.store') }}">
                            @csrf
                            @include('ingredient.form', ['name' => null])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
