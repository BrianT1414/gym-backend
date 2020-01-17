<?php

namespace App\Http\Controllers;

use App\MuscleGroup;
use Illuminate\Http\Request;

class MuscleGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MuscleGroup::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $muscle_group = MuscleGroup::create($request->all());

	return response()->json($muscle_group, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MuscleGroup  $muscleGroup
     * @return \Illuminate\Http\Response
     */
    public function show(MuscleGroup $muscleGroup)
    {
        return $muscleGroup;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MuscleGroup  $muscleGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MuscleGroup $muscleGroup)
    {
        $muscleGroup->update($request->all());

	return $muscleGroup;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MuscleGroup  $muscleGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(MuscleGroup $muscleGroup)
    {
	    $muscleGroup->delete();

	    return response()->json(['message' => 'deleted'], 200);
    }
}
