<div class="form-group row">
    <div class="col-md-10">
        @foreach($allRecipes as $recipe)
            <div class="mealplan-recipe form-check">
                <input class="form-check-input" id="recipe-{{ $recipe->id }}" type="checkbox" name="recipes[{{$recipe->id}}]" @if( $selectedRecipes && $selectedRecipes->contains('id', $recipe->id)) checked @endif>
                <label class="form-check-label" for="recipe-{{ $recipe->id }}">{{ $recipe->name }}</label>
            </div>
        @endforeach

        @if ($errors->has('recipes'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('recipes') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row mb-0">
    <div class="col-md-10">
        <button type="submit" class="btn btn-primary">
            {{ __('Save') }}
        </button>
    </div>
</div>
