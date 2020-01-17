<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	protected $guarded = [];

	public function securities()
	{
		return $this->hasMany('App\Security');
	}
}
