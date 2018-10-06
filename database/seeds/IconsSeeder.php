<?php

use App\Models\Icon;
use Illuminate\Database\Seeder;

class IconsSeeder extends Seeder
{
	public function run() {
		Icon::truncate();

		$icons = [
			[
				'id'  => 'foam',
				'ios' => 'cloud',
			],
			[
				'id'  => 'ice',
				'ios' => 'cube',
			],
			[
				'id'  => 'alcohol',
				'ios' => 'nuclear',
			],
		];

		foreach ($icons as $icon) {
			Icon::create($icon);
		}
	}
}
