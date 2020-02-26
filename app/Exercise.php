<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
	protected $guarded = [];

	public $timestamps = false;

	public function muscle()
	{
		return $this->belongsTo('App\Muscle');
	}

	public function muscle_group()
	{
	    return $this->belongsTo('App\MuscleGroup');
	}
}
