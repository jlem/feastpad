export class RecipeIngredient {
    /**
     * @param {?number} ingredient_id
     * @param {?string} quantity
     * @param {?number} units
     */
    constructor(ingredient_id = null, quantity = null, units = null) {
        this.ingredient_id = ingredient_id;
        this.quantity = quantity;
        this.units = units;
    }
}
