<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Icon extends Model
{
	protected $fillable = [ 'id', 'ios' ];

	protected $casts = [
		'id' => 'string'
	];


	public function ingredients() {
		return $this->belongsToMany(Ingredient::class);
	}
}
