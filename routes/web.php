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

Route::get('/', function () {
    return view('welcome');
});

Route::get('auth', 'AuthController@checkUser');
Route::post('login', 'AuthController@login');
Route::get('logout', 'AuthController@logout');
Route::get('exercises/{id}/sets/last', 'SetController@lastSet');
Route::get('workouts/current', 'WorkoutController@current');
Route::get('workouts/new', 'WorkoutController@store');
Route::get('workouts/continue', 'WorkoutController@continueWorkout');

Route::resource('workouts', 'WorkoutController');
Route::resource('muscle_groups', 'MuscleGroupController');
Route::resource('muscles', 'MuscleController');
Route::resource('exercises', 'ExerciseController');
Route::resource('sets', 'SetController');

