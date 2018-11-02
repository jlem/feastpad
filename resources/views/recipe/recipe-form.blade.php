<div class="recipe-form" id="recipe">
    <div class="form__field-group">
        <div class="form__field">
            <input v-model="name"
                   class="form__field-input"
                   placeholder="Name"
                   type="text"
                   required
                   autofocus>
        </div>
        <div class="form__field">
            <textarea v-model="instructions"
                      placeholder="Directions"
                      rows="10"
                      id="name"
                      class="form__field-input"
                      required>
            </textarea>
        </div>
    </div>
    <div class="ingredient-list">
        <h2>Ingredients</h2>
        <div v-for="(recipeIngredient, index) in recipeIngredients" class="ingredient-item">
            <div class="form__field-group ingredient-field-group">
                <div class="form__field">
                    <v-select :on-change="updateRecipeIngredientId.bind(null, recipeIngredient)"
                              v-bind:value="findIngredientById(recipeIngredient.ingredient_id)"
                              placeholder="Select ingredient..."
                              class="ingredient-selector ingredient-item__control ingredient-item__control-selector"
                              label="name"
                              :options="ingredientOptions">
                    </v-select>
                </div>
                <div class="form__field">
                    <input v-model="recipeIngredient.quantity"
                           class="quantity-input ingredient-item__control ingredient-item__control-input"
                           type="text"
                           placeholder="Quantity">
                </div>
                <div class="form__field">
                    <v-select :on-change="updateRecipeIngredientUnits.bind(null, recipeIngredient)"
                              v-bind:value="findUnitOfMeasureById(recipeIngredient.units)"
                              placeholder="Select unit of measure..."
                              class="unit-selector ingredient-item__control ingredient-item__control-selector"
                              :options="unitOfMeasureOptions">
                    </v-select>
                </div>
            </div>
            <i v-on:click="removeRecipeIngredient(index)" class="ingredient-item__remove far fa-trash-alt"></i>
        </div>
        <button v-on:click="addRecipeIngredient()"
                type="button"
                class="button button--light d-sm-block w-100"><i class="fas fa-plus"></i> Add Ingredient</button>
    </div>
    <div class="form__login-button">
        <button type="button" v-on:click="submit()" class="button button--primary d-sm-block w-100">{{ __('Save') }}</button>
    </div>
</div>

@push('scripts')
    <script>
        window.recipe_id = @json($recipe_id);
        window.recipe_name = @json($recipe_name);
        window.recipe_instructions = @json($recipe_instructions);
        window.recipe_ingredients = @json($recipe_ingredients);
        window.ingredientOptions = @json($ingredientOptions);
        window.unitOfMeasureOptions = @json($unitOfMeasureOptions);
    </script>
    <script src="/js/recipes/recipe-form.js"></script>
@endpush
