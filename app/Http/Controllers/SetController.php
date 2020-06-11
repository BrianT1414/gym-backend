<?php

namespace App\Http\Controllers;

use Auth;
use App\Set;
use Illuminate\Http\Request;

class SetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
	    if (Auth::check()) {
		    return Set::where('user_id', Auth::user()->id)
			    ->when($request->get('workout_id'), function ($q) use ($request) {
			    $q->where('workout_id', $request->get('workout_id'));
		    })->get();
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
	    $values = $request->all();
	    $values['user_id'] = Auth::user()->id;

	    $set = Set::create($values);

	    return $set;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Set  $set
     * @return \Illuminate\Http\Response
     */
    public function show(Set $set)
    {
	    if (Auth::check() && $set->user_id == Auth::user()->id) {
		return $set;
	    }
	    return response()->json(['message' => 'unauthorized'], 401);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Set  $set
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Set $set)
    {
	    if (Auth::check() && $set->user_id == Auth::user()->id) {
		    $set->update([
                'reps' => $request->get('reps'),
                'weight' => $request->get('weight')
            ]);

		    return $set;
	    }
	    return response()->json(['message' => 'unauthorized'], 401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Set  $set
     * @return \Illuminate\Http\Response
     */
    public function destroy(Set $set)
    {
	    if (Auth::check() && $set->user_id == Auth::user()->id) {
		    $set->delete();

		    return response()->json(['message' => 'deleted'], 200);
	    }
	    return response()->json(['message' => 'unauthorized'], 401);
    }

    public function lastSet($id)
    {
        if (Auth::check()) {
            return Set::where('user_id', Auth::user()->id)->where('exercise_id', $id)->orderBy('created_at', 'desc')->first();
        }

	    return response()->json(['message' => 'unauthorized'], 401);
    }
}
