@extends('layouts/simple-page')
@section('header')
    <h1>Log in to FeastPad!</h1>
@endsection
@section('body')
    <form class="form" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form__field-group">
            <div class="form__field">
                <div class="form__field-header">
                    <label class="form__field-label">Email</label> @if ($errors->has('email'))<span class="form__field-error">{{ $errors->first('email') }}</span> @endif
                </div>
                <input class="form__field-input" placeholder="Email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>
            <div class="form__field">
                <div class="form__field-header">
                    <span class="form__label"></span> @if ($errors->has('password'))<span class="form__error">{{ $errors->first('password') }}</span> @endif
                </div>
                <input class="form__field-input" placeholder="Password" type="password" name="password" required autofocus>
            </div>
        </div>
        <div class="form__login-button">
            <button type="submit" class="button button--primary d-sm-block w-100">{{ __('Login') }}</button>
        </div>
        <h3 style="margin-top: 1.5em;">
            <a href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        </h3>
        <input style="opacity: 0" class="form-check-input" type="checkbox" name="remember" id="remember" checked }}>
    </form>
@endsection
@section('footer')
    <a href="/" class="button button--ghost d-block w-100">
        Need an account? Sign up
    </a>
@endsection
