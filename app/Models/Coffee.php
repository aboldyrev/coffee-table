<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Coffee extends Model
{
	protected $fillable = [ 'name' ];


	public function cup():BelongsTo {
		return $this->belongsTo(Cup::class);
	}


	public function ingredients():BelongsToMany {
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
