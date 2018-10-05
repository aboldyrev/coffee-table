<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
	protected $fillable = [ 'name' ];


	public function coffees() {
		return $this
			->belongsToMany(Coffee::class)
			->withPivot('volume');
	}


	public function icons() {
		return $this->belongsToMany(Icon::class);
	}
}
