@extends('layouts.app')
@section('content')
    @guest
        @include('page-partials.register')
    @else
        @include('page-partials.dashboard')
    @endguest
@endsection
