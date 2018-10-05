<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cup extends Model
{
	protected $fillable = [
		'name',
		'volume'
	];

	protected $casts = [
		'volume' => 'integer'
	];


	public function coffees() {
		return $this->hasMany(Coffee::class);
	}
}
