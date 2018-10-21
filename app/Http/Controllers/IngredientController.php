<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use App\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /** @var User $user */
        $user = $request->user();

        /** @var Collection $ingredients */
        $ingredients = $user->ingredients;

        return view('ingredient.index', [
            'ingredients' =>  $ingredients->sortBy('name')->values()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ingredient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ingredient = new Ingredient();
        $ingredient->user_id = $request->user()->id;
        $ingredient->name = $request->get('name');
        $ingredient->save();

        return redirect('/ingredients');
    }

    /**
     * Display the specified resource.
     *
     * @param Ingredient $ingredient
     * @return \Illuminate\Http\Response
     */
    public function show(Ingredient $ingredient)
    {
        return view('ingredient.edit', [
            'ingredient' => $ingredient
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Ingredient $ingredient
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingredient $ingredient)
    {
        // not used
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Ingredient $ingredient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingredient $ingredient)
    {
        $ingredient->name = $request->get('name');
        $ingredient->save();

        return redirect('/ingredients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Ingredient $ingredient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();

        return redirect('/ingredients');
    }
}
