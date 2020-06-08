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

    public function scopeWhereCentralDate($query, $column, $operator = '=', $centralDate)
    {
        $utcTime = \Carbon\Carbon::parse($centralDate, 'CST')->setTimezone('UTC');
        return $query->where($column, $operator, $utcTime);
    }
}
