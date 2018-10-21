<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $latestMealPlan = null;
        if ($request->user()) {
            $latestMealPlan = $request->user()->mealplans()->latest()->first();
        }

        return view('home', [
            'latestMealPlan' => $latestMealPlan
        ]);
    }
}
