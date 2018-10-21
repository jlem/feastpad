<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('profile', 'ProfileController@show')->middleware('auth');

Route::resource('stores', 'StoreController')->middleware('auth');
Route::resource('aisles', 'AisleController')->middleware('auth');
Route::resource('recipes', 'RecipeController')->middleware(['auth', 'ownership']);
Route::resource('ingredients', 'IngredientController')->middleware(['auth', 'ownership']);
Route::resource('mealplans', 'MealPlanController')->middleware(['auth', 'ownership']);
