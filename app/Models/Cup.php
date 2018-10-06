<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cup extends Model
{
	protected $fillable = [
		'name',
		'volume',
	];

	protected $casts = [
		'volume' => 'integer',
	];


	public function coffees() {
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
