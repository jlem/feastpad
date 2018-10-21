<h1>{{ $title ?? $mealplan->getDate() }}</h1>
<h2>Meals</h2>
    @foreach($mealplan->recipes as $recipe)
        <a class="d-block" href="{{ route('recipes.show', ['id' => $recipe->id] ) }}"> {{ $recipe->name }} </a>
    @endforeach
<h2 class="mt-5">Shopping List</h2>
    @foreach($mealplan->getIngredients() as $ingredient)
        <div>{{ $ingredient->name }}</div>
    @endforeach
