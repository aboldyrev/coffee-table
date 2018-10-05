<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoffeeIngredientTable extends Migration
{
	protected $table = 'coffee_ingredient';


	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create($this->table, function(Blueprint $table) {

			$table
				->unsignedInteger('coffee_id')
				->index();

			$table
				->unsignedInteger('ingredient_id')
				->index();

			$table->index([ 'coffee_id', 'ingredient_id' ]);

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
