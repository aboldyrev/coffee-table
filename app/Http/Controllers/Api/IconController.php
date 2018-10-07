<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\IconResource;
use App\Models\Icon;

class IconController extends Controller
{
	public function index() {
		return IconResource::collection(Icon::all());
	}


	public function show(Icon $icon) {
		return new IconResource($icon);
	}
}
