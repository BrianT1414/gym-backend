<?php

namespace App\Http\Controllers;

use Auth;
use App\Workout;
use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
	    if (Auth::check()) {
		return Workout::where('user_id', Auth::user()->id)->get();
	    }
	    return [];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    if (Auth::check()) {
		    $values = $request->all();
		    $values['user_id'] = Auth::user()->id;

		$workout = Workout::create($values);

		return $workout;
	    }
    }

    public function continueWorkout()
    {	
	    if (Auth::check()) {
		    $workout = Workout::where('user_id', Auth::user()->id)->latest()->first();
		    return $workout;
	    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Workout  $workout
     * @return \Illuminate\Http\Response
     */
    public function show(Workout $workout)
    {
	    if (Auth::check() && $workout->user_id == Auth::user()->id) {
		return $workout->load(['sets.exercise.muscle', 'sets.exercise.muscle_group']);
	    }
	    return response()->json(['message' => 'unauthorized'], 401);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Workout  $workout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Workout $workout)
    {
	    if (Auth::check() && $workout->user_id == Auth::user()->id) {
		    $workout->update($request->all());

		    return $workout;
	    }
	    return response()->json(['message' => 'unauthorized'], 401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Workout  $workout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workout $workout)
    {
        //
    }

    public function current() {
        if (Auth::check()) {
            $workout = Workout::where('user_id', Auth::user()->id)->latest()->first();

            if ($workout->created_at->isToday()) {
                return $workout;
            }

            return response()->json([], 404);
        }

	    return response()->json(['message' => 'unauthorized'], 401);
    }
}
