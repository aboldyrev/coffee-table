<?php

namespace App\Http\Controllers;


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
