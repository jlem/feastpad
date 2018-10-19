new Vue({
	el: '#recipes',
	data: {
		selectedIngredients: []
	},
	created: function() {
		if (window.recipeIngredients && window.recipeIngredients.length) {
			this.selectedIngredients = window.recipeIngredients.map(ingredient => {
				return {
					label: ingredient.name,
					value: ingredient.id
				};
			});
		}
	},
	computed: {
		ingredientOptions: function () {
			let selectedIngredients = this.selectedIngredients.filter(x => x);
			return window.ingredientOptions.filter(option => selectedIngredients.findIndex(si => si.value === option.value) === -1);
		}
	},
	methods: {
		addIngredient: function ($event) {
			$event.preventDefault();
			this.selectedIngredients.push({});
		},
		removeIngredient: function (index, $event) {
			$event.preventDefault();

			if (index === 0) {
				return;
			}

			this.selectedIngredients.splice(index, 1);
		}
	}
});
