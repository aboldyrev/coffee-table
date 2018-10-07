<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ingredient extends Model
{
	protected $fillable = [ 'name', 'harder' ];

	protected $casts = [
		'harder' => 'boolean',
	];


	public function coffees():BelongsToMany {
		return $this
			->belongsToMany(Coffee::class)
			->withPivot('volume');
	}


	public function icons():BelongsToMany {
		return $this->belongsToMany(Icon::class);
	}


	protected static function boot() {
		parent::boot();

		self::deleting(function(self $model) {

			$model->coffees()->detach();
			$model->icons()->detach();

		});
	}
}
