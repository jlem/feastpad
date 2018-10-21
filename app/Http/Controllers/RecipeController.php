<?php

namespace App\Http\Controllers;

use Auth;
use App\Presenters\DropdownPresenter;
use App\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
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
        $presenter = new DropdownPresenter();
        $ingredients = $request->user()->ingredients;
        $ingredientOptions = $presenter->convertToOptions($ingredients, 'name', 'id');

        return view('recipe.create', [
            'ingredientOptions' => $ingredientOptions
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
        $recipe = new Recipe();
        $recipe->user_id = $request->user()->id;
        $recipe->name = $request->get('name');
        $recipe->instructions = $request->get('instructions');
        $recipe->save();

        $recipe->ingredients()->sync($request->get('ingredients'));

        return redirect('/recipes');
    }

    /**
     * Display the specified resource.
     *
     * @param Recipe $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
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
        $presenter = new DropdownPresenter();
        $ingredients = $request->user()->ingredients;
        $ingredientOptions = $presenter->convertToOptions($ingredients, 'name', 'id');

        return view('recipe.edit', [
            'ingredientOptions' => $ingredientOptions,
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
        $recipe->name = $request->get('name');
        $recipe->instructions = $request->get('instructions');
        $recipe->ingredients()->sync($request->get('ingredients'));

        $recipe->save();

        return redirect('/recipes');
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
