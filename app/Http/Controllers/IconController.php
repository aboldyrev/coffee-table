<?php

namespace App\Http\Controllers;

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
