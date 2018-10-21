@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="col-md-auto w-md-600">
            <h1>Hey there, {{ $user->name }}</h1>

            <a class="button button--primary d-block w-100" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
@endsection
