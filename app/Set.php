<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
	protected $guarded = [];

	public $appends = ['exercise_name', 'muscle_name', 'muscle_group_name'];

	public function exercise()
	{
		return $this->belongsTo('App\Exercise');
	}

	public function getExerciseNameAttribute()
	{
		return $this->exercise->name;
	}

	public function getMuscleGroupNameAttribute()
	{
		return $this->exercise->muscle_group->name;
	}

	public function getMuscleNameAttribute()
	{
		if ($this->exercise->muscle) {
			return $this->exercise->muscle->name;
		}

		return '';
	}
}
