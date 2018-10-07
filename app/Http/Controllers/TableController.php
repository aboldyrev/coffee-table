<?php

namespace App\Http\Controllers;

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
