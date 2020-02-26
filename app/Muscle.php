<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Muscle extends Model
{
    protected $guarded = [];

    public function muscle_group()
    {
	    return $this->belongsTo('App\MuscleGroup');
    }
}
