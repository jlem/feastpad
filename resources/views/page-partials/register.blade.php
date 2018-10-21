@extends('layouts/simple-page')
@section('header')
    <div>
        <h1>Welcome to FeastPad!</h1>
        <h3>Save recipes. Plan meals. Easy shopping lists.</h3>
    </div>
@endsection
@section('body')
    <form class="form" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form__field-group">
            <div class="form__field">
                <div class="form__field-header">
                    <label class="form__field-label">Name</label> @if ($errors->has('name'))<span class="form__field-error">{{ $errors->first('name') }}</span> @endif
                </div>
                <input autocomplete="new-password" class="form__field-input nolp" placeholder="Name" type="text" name="name" value="{{ old('name') }}" required autofocus>
            </div>
            <div class="form__field">
                <div class="form__field-header">
                    <label class="form__field-label">Email</label> @if ($errors->has('email'))<span class="form__field-error">{{ $errors->first('email') }}</span> @endif
                </div>
                <input autocomplete="new-password" class="form__field-input nolp" placeholder="Email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>
            <div class="form__field">
                <div class="form__field-header">
                    <span class="form__label"></span> @if ($errors->has('password'))<span class="form__error">{{ $errors->first('password') }}</span> @endif
                </div>
                <input autocomplete="new-password" class="form__field-input nolp" placeholder="Password" type="password" name="password" required autofocus>
            </div>
        </div>
        <div class="form__login-button">
            <button type="submit" class="button button--primary d-sm-block w-100">{{ __('Sign up') }}</button>
        </div>
    </form>
@endsection
@section('footer')
    <a href="{{ route('login') }}" class="button button--ghost d-block w-100">
        Have an account? Log in
    </a>
@endsection
