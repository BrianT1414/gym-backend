<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    	protected $guarded = [];

	public function security()
	{
		return $this->belongsTo('App\Security');
	}

    	public function getPriceAttribute($value)
    	{
	    	return $value / 100;
    	}

    	public function setPriceAttribute($value)
    	{
	    	$this->attributes['price'] = $value * 100;
    	}
}
