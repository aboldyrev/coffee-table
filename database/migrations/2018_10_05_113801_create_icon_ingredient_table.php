<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIconIngredientTable extends Migration
{
	protected $table = 'icon_ingredient';

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create($this->table, function(Blueprint $table) {
			$table
				->string('icon_id')
				->index();

			$table
				->unsignedInteger('ingredient_id')
				->index();

			$table->index([ 'icon_id', 'ingredient_id' ]);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists($this->table);
	}
}
