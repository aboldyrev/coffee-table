<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MetaController extends Controller
{
	public function index() {
		return [
			'meta' => [
				[
					'name' => 'Таблица',
					'url'  => route('api.table'),
				],
				[
					'name' => 'Напитки',
					'url'  => route('api.coffees.index'),
				],
				[
					'name' => 'Ёмкости',
					'url'  => route('api.cups.index'),
				],
			]
		];
	}
}
