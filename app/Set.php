<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
	protected $guarded = [];

	public function exercise()
	{
		return $this->belongsTo('App\Exercise');
	}
}
