@extends('layouts.app')
@section('content')
    <div class="container">
        <a class="btn btn-success" href="/ingredients/create">Add Ingredient</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ingredients as $ingredient)
                    <tr>
                        <td>{{ $ingredient->id }}</td>
                        <td>{{ $ingredient->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
