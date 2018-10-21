<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//route::get('/recipes/{recipeee}', function (\App\Recipe $recipeee) {
//   return 'hey';
//})->middleware('can:view,recipeee');

Route::resource('stores', 'StoreController')->middleware('auth');
Route::resource('aisles', 'AisleController')->middleware('auth');
Route::resource('recipes', 'RecipeController')->middleware(['auth', 'ownership']);
Route::resource('ingredients', 'IngredientController')->middleware(['auth', 'ownership']);
Route::resource('mealplans', 'MealPlanController')->middleware('auth');
