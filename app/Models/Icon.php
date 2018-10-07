<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Icon extends Model
{
	protected $fillable = [ 'id', 'ios' ];

	protected $casts = [
		'id' => 'string',
	];


	public function ingredients():BelongsToMany {
		return $this->belongsToMany(Ingredient::class);
	}
}
