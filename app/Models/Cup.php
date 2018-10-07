<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cup extends Model
{
	protected $fillable = [
		'name',
		'volume',
	];

	protected $casts = [
		'volume' => 'integer',
	];


	public function coffees():HasMany {
		return $this->hasMany(Coffee::class);
	}


	protected static function boot() {
		parent::boot();

		self::deleting(function(self $model) {

			$model
				->coffees()
				->each(function(Coffee $coffee) {

					$coffee->delete();

				});

		});
	}
}
