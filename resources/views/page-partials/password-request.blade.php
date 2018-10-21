@extends('layouts/simple-page')
@section('header')
    <h1>Request Password Reset</h1>
@endsection
@section('body')
    <form class="form" method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="form__field-group">
            <div class="form__field">
                <div class="form__field-header">
                    <label class="form__field-label">Email</label> @if ($errors->has('email'))<span class="form__field-error">{{ $errors->first('email') }}</span> @endif
                </div>
                <input class="form__field-input" placeholder="Email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>
        </div>
        <div class="form__login-button">
            <button type="submit" class="button button--primary d-sm-block w-100">{{ __('Send Password Reset Link') }}</button>
        </div>
        <h3>
            <a href="/login">Cancel</a>
        </h3>
    </form>
@endsection
@section('footer')
@endsection
