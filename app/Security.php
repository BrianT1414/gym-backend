<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Security extends Model
{
	protected $guarded = [];
	protected $appends = ['average_cost', 'current_holdings'];

	public function trades()
	{
		return $this->hasMany('App\Trade');
	}

	public function company()
	{
		return $this->belongsTo('App\Company');
	}

	public function getAverageCostAttribute()
	{
		$cost = 0;
	       	$this->trades->map(function($trade) use(&$cost) {
			if ($trade->action == 'buy') {
				$cost += $trade->price;
			}
		});

		return $cost;
	}

	public function getCurrentHoldingsAttribute()
	{	
		$holdings = 0;
	       	$this->trades->map(function($trade) use(&$holdings) {
			if ($trade->action == 'buy') {
				$holdings += $trade->qty;
			} else {
				$holdings -= $trade->qty;
			}
		});

		return $holdings;
	}
}
