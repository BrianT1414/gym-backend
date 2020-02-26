<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    protected $guarded = [];

    public function sets()
    {
	    return $this->hasMany('App\Set');
    }
}
