<div class="form__field-group">
    <div class="form__field">
        <div class="form__field-header">
            <label class="form__field-label">Name</label> @if ($errors->has('name'))<span class="form__field-error">{{ $errors->first('name') }}</span> @endif
        </div>
        <input class="form__field-input" placeholder="Name" type="text" name="name" value="{{ $name ?? old('name') }}" required autofocus>
    </div>
</div>
<div class="form__login-button">
    <button type="submit" class="button button--primary d-sm-block w-100">{{ __('Save') }}</button>
</div>

