<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IngredientResource extends JsonResource
{
	public function toArray($request) {
		return $this->load([ 'icons' => function($query) {
			$query->select([ 'id', 'ios' ]);
		} ])->toArray();
	}
}
