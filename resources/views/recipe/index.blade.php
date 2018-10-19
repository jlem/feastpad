@extends('layouts.app')
@section('content')
    <div class="container">
        <a class="btn btn-success" href="/recipes/create">Add Recipe</a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
            </tr>
            </thead>
            <tbody>
            @foreach($recipes as $recipe)
                <tr>
                    <td>{{ $recipe->id }}</td>
                    <td><a href="{{ route('recipes.show', ['id' => $recipe->id]) }}">{{ $recipe->name }}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
