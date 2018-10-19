<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\Presenters\DropdownPresenter;
use App\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('recipe.index', [
            'recipes' => Recipe::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $presenter = new DropdownPresenter();
        $ingredients = Ingredient::all();
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $presenter = new DropdownPresenter();
        $ingredients = Ingredient::all();
        $ingredientOptions = $presenter->convertToOptions($ingredients, 'name', 'id');

        return view('recipe.edit', [
            'ingredientOptions' => $ingredientOptions,
            'recipe' => Recipe::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd(Recipe::find($id)->ingredients);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $recipe = Recipe::find($id);

        $recipe->name = $request->get('name');
        $recipe->instructions = $request->get('instructions');
        $recipe->ingredients()->sync($request->get('ingredients'));

        $recipe->save();

        return redirect('/recipes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
