<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Coffee;

class TableController extends Controller
{
	public function index() {
		return Coffee
			::with(
				[
					'ingredients' => function($query) {
						$query->orderBy('created_at', 'desc');
					},
					'cup',
				])
			->get();
    }
}
