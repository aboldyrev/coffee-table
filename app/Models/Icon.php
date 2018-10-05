<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Icon extends Model
{
	protected $fillable = [ 'ios' ];


	public function ingredients() {
		return $this->belongsToMany(Ingredient::class);
	}
}
