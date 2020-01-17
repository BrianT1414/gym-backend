<?php

namespace App\Http\Controllers;

use App\Muscle;
use Illuminate\Http\Request;

class MuscleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Muscle::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Muscle::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Muscle  $muscle
     * @return \Illuminate\Http\Response
     */
    public function show(Muscle $muscle)
    {
        return $muscle;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Muscle  $muscle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Muscle $muscle)
    {
	    $muscle->update($request->all());

	    return $muscle;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Muscle  $muscle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Muscle $muscle)
    {
	    $muscle->delete();

	    return response()->json(['message' => 'deleted'], 200);
    }
}
