@extends('layouts.app')
@section('content')
    <div class="resource-page d-flex justify-content-center">
        <div class="col-md-auto w-md-600">
            <div class="resource-page__header">
                <h1>@yield('header')</h1>
            </div>
            @yield('body')
        </div>
    </div>
@endsection
