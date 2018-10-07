<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CoffeeResource extends JsonResource
{
	public function toArray($request) {
		return $this->load('cup', 'ingredients')->toArray();
	}
}
