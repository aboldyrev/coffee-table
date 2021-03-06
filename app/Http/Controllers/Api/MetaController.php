<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;

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
				[
					'name' => 'Ингредиенты',
					'url'  => route('api.ingredients.index'),
				],
				[
					'name' => 'Иконки',
					'url'  => route('api.icons.index'),
				],
			],
		];
	}
}
