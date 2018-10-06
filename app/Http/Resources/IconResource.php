<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IconResource extends JsonResource
{
	public function toArray($request) {
		return [
			'icon' => $this->id,
			'ios'  => $this->ios,
		];
	}
}
