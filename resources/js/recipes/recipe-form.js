import { Ingredient, RecipeIngredient, UnitOfMeasure } from '../models';
import axios from 'axios';

/**
 * @param {RecipeIngredient[]} recipeIngredients
 * @param {Ingredient} ingredient
 * @returns {boolean}
 */
const availableIngredients = (recipeIngredients, ingredient) => {
    return !!ingredient ? recipeIngredients.findIndex(ri => ri.ingredient_id === ingredient.id) === -1 : true;
};

/**
 * @param {object} data
 * @returns {RecipeIngredient}
 */
const makeRecipeIngredient = data => {
    return new RecipeIngredient(data.ingredient_id, data.quantity, data.units)
};

/**
 * @param {object} data
 * @returns {Ingredient}
 */
const makeIngredientOption = data => {
    return new Ingredient(data.name, data.id);
};

/**
 *
 * @param {object} data
 * @returns {UnitOfMeasure[]}
 */
const mapUnitOptions = data => {
    return Object.keys(data).map(key => {
        return new UnitOfMeasure(key, data[key]);
    });
};

new Vue({
	el: '#recipe',

    /**
     * @property {number} id
     * @property {string} name
     * @property {string} instructions
     * @property {RecipeIngredient[]} recipeIngredients
     * @property {UnitOfMeasure[]} unitOfMeasureOptions
     * @property {Ingredient[]} _ingredientOptions
     */
	data: {
	    id: null,
	    name: null,
        instructions: null,
		recipeIngredients: [],
        unitOfMeasureOptions: {},
        _ingredientOptions: []
	},
	created() {
	    this.id = window.recipe_id;
	    this.name = window.recipe_name;
	    this.instructions = window.recipe_instructions;
        this.recipeIngredients = (window.recipe_ingredients || []).map(makeRecipeIngredient);
	    this.unitOfMeasureOptions = mapUnitOptions(window.unitOfMeasureOptions || {});
		this._ingredientOptions = (window.ingredientOptions || []).map(makeIngredientOption);
	},
	computed: {
        /**
         * @returns {Ingredient[]}
         */
		ingredientOptions() {
			return this._ingredientOptions.filter(availableIngredients.bind(null, this.recipeIngredients));
		}
	},
	methods: {
        /**
         * @param {number} id
         * @returns {Ingredient}
         */
	    findIngredientById(id) {
	        return this._ingredientOptions.find(x => x.id === id);
        },
        /**
         * @param {number} id
         * @returns {UnitOfMeasure}
         */
        findUnitOfMeasureById(id) {
	        return this.unitOfMeasureOptions.find(x => x.value === id);
        },
        /**
         * @param {RecipeIngredient} recipeIngredient
         * @param {Ingredient} ingredientOption
         */
	    updateRecipeIngredientId(recipeIngredient, ingredientOption) {
	        recipeIngredient.ingredient_id = ingredientOption.id;
        },
        /**
         * @param {RecipeIngredient} recipeIngredient
         * @param {UnitOfMeasure} unitOption
         */
        updateRecipeIngredientUnits(recipeIngredient, unitOption) {
            recipeIngredient.units = unitOption.value;
        },
		addRecipeIngredient() {
			this.recipeIngredients.push(new RecipeIngredient());
		},
        /**
         * @param {number} index
         */
        removeRecipeIngredient(index) {
            this.recipeIngredients.splice(index, 1);
        },
        submit() {
            let recipeBasePath = '/recipes';

            let request = {
                method: 'POST',
                url: recipeBasePath,
                data: {
                    name: this.name,
                    instructions: this.instructions,
                    recipeIngredients: this.recipeIngredients
                }
            };

            if (this.id) {
                request.method = 'PUT';
                request.url = `${recipeBasePath}/${this.id}`;
            }

            axios(request)
                .then(() => window.location.href = recipeBasePath)
                .catch(console.error)
        }
	}
});
