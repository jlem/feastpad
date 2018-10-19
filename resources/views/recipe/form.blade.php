<div id="recipes">
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $name) }}" required autofocus>

            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="instructions" class="col-md-4 col-form-label text-md-right">{{ __('Instructions') }}</label>

        <div class="col-md-6">
        <textarea
                rows="10"
                id="name"
                class="form-control{{ $errors->has('instructions') ? ' is-invalid' : '' }}"
                name="instructions"
                required>{{ old ('instructions', $instructions) }}</textarea>

            @if ($errors->has('instructions'))
                <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('instructions') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="ingredients" class="col-md-4 col-form-label text-md-right">{{ __('Ingredients') }}</label>
        <div class="col-md-6">
            <div class="input-group ingredient-selector" v-for="(ingredient, index) in selectedIngredients">
                <input v-if="selectedIngredients[index] && !!selectedIngredients[index].value" type="hidden" :name="'ingredients['+index+']'" :value="selectedIngredients[index] && selectedIngredients[index].value" />
                <v-select placeholder="Search..." v-model="selectedIngredients[index]" class="ingredient-dropdown" :options="ingredientOptions"></v-select>
                <i v-if="index > 0" v-on:click="removeIngredient(index, $event)" class="ingredient-remove far fa-trash-alt"></i>
            </div>
            <button v-on:click="addIngredient($event)" class="btn btn-primary">Add Ingredient</button>
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary" :disabled="selectedIngredients.filter(x => x).length === 0">
                {{ __('Save') }}
            </button>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        window.ingredientOptions = @json($ingredientOptions);
        window.recipeIngredients = @json($recipeIngredients);
    </script>
    <script src="/js/recipes/form.js"></script>
@endpush
