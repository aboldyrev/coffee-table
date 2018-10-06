<?php

use App\Models\Cup;
use Illuminate\Database\Seeder;

class CupsSeeder extends Seeder
{
	public function run() {
		$cups = [
			[
				'name'   => 'Чашка демитас',
				'volume' => 90,
			],
			[
				'name'   => 'Стакан демитас',
				'volume' => 90,
			],
			[
				'name'   => 'Малая чашка для капучино',
				'volume' => 150,
			],
			[
				'name'   => 'Большая чашка для капучино',
				'volume' => 250,
			],
			[
				'name'   => 'Чашка для капучино',
				'volume' => 200,
			],
			[
				'name'   => 'Малый тумблер',
				'volume' => 90,
			],
			[
				'name'   => 'Большой тумблер',
				'volume' => 250,
			],
			[
				'name'   => 'Латте-стакан',
				'volume' => 250,
			],
			[
				'name'   => 'Айриш-стакан',
				'volume' => 250,
			],
		];

		foreach ($cups as $cup) {
			Cup::firstOrCreate($cup);
		}
	}
}
