@extends('layouts.app')
@section('content')
    <div class="container">
        <a class="btn btn-success" href="/mealplans/create">Create Mealplan</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Date</th>
                    <th scope="col">Meal Count</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mealplans as $mealplan)
                    <tr>
                        <td>{{ $mealplan->id }}</td>
                        <td><a href="{{ route('mealplans.show', ['id' => $mealplan->id]) }}">{{ $mealplan->getDate() }}</a></td>
                        <td>{{ $mealplan->recipes->count() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
