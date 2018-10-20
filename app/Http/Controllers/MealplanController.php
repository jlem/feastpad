<?php

namespace App\Http\Controllers;

use Auth;
use App\Mealplan;
use Illuminate\Http\Request;

class MealplanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('mealplan.index', [
            'mealplans' => $request->user()->mealplans()->with('recipes')->get()
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
        return view('mealplan.create', [
            'allRecipes' => $request->user()->recipes
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
        $mealplan = new Mealplan();
        $mealplan->user_id = $request->user()->id;
        $mealplan->save();

        $mealplan->recipes()->sync(array_keys($request->get('recipes')));

        return redirect('/mealplans');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('mealplan.show', [
            'mealplan' => Mealplan::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        return view('mealplan.edit', [
            'allRecipes' => $request->user()->recipes,
            'mealplan' => Mealplan::find($id)
        ]);
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
        //
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
