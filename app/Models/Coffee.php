<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coffee extends Model
{
	protected $fillable = [ 'name' ];


	public function cup() {
		return $this->belongsTo(Cup::class);
	}


	public function ingredients() {
		return $this
			->belongsToMany(Ingredient::class)
			->withPivot('volume');
	}


	protected static function boot() {
		parent::boot();

		self::deleting(function(self $model) {

			$model->ingredients()->detach();

		});
	}
}
