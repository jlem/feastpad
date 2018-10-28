<?php

namespace App\Http\Controllers;

use App\Enums\UnitOfMeasure;
use Auth;
use App\Presenters\DropdownPresenter;
use App\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecipeController extends Controller
{

    public function test(Request $request) {
        return response()->json($request->toArray());
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('recipe.index', [
            'recipes' => $request->user()->recipes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $ingredients = $request->user()->ingredients;

        return view('recipe.create', [
            'ingredientOptions' => $ingredients,
            'unitOfMeasureOptions' => UnitOfMeasure::toArray()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            // Create the recipe
            $recipe = new Recipe();
            $recipe->user_id = $request->user()->id;
            $recipe->name = $request->get('name');
            $recipe->instructions = $request->get('instructions');
            $recipe->save();

            // Create new RecipeIngredients
            foreach($request->get('recipeIngredients') as $recipeIngredientData) {
                $recipe->ingredients()->create([
                    'recipe_id' => $recipe->id,
                    'ingredient_id' => $recipeIngredientData['ingredient_id'],
                    'quantity' => $recipeIngredientData['quantity'],
                    'units' => $recipeIngredientData['units']
                ]);
            }

            DB::commit();
            return response()->json('ok');
        }
        catch (\Exception $e) {
            DB::rollBack();
            return response()->json('Something went wrong with the server', 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Recipe $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        $recipe->load('ingredients.ingredient');

        return view('recipe.show', [
            'recipe' => $recipe
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param Recipe $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Recipe $recipe)
    {
        $ingredients = $request->user()->ingredients;

        return view('recipe.edit', [
            'ingredientOptions' => $ingredients,
            'unitOfMeasureOptions' => UnitOfMeasure::toArray(),
            'recipe' => $recipe
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Recipe $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        try {
            DB::beginTransaction();
            $recipe->name = $request->get('name');
            $recipe->instructions = $request->get('instructions');
            $recipe->ingredients()->delete(); // Easier to blow away all existing RecipeIngredients and then just re-create them
            $recipe->save();

            foreach ($request->get('recipeIngredients') as $recipeIngredientData) {
                $recipe->ingredients()->create([
                    'recipe_id' => $recipe->id,
                    'ingredient_id' => $recipeIngredientData['ingredient_id'],
                    'quantity' => $recipeIngredientData['quantity'],
                    'units' => $recipeIngredientData['units']
                ]);
            }

            DB::commit();
            return response()->json('ok');
        }
        catch(\Exception $e) {
            DB::rollBack();
            return response()->json('Something went wrong with the server', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Recipe $recipe
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();

        return redirect('/recipes');
    }
}
