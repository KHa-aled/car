<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCarsTable extends Migration {

	public function up()
	{
		Schema::create('cars', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('car_name');
			$table->string('car_type');
			$table->tinyInteger('conditioner');
			$table->tinyInteger('gear');
			$table->integer('number_seat')->default('0');
			$table->float('kilometer');
			$table->float('price');
			$table->string('number_car');
			$table->integer('company_id');
			$table->integer('marker_id');
			$table->integer('mode_id');
			$table->string('distance');
		});
	}

	public function down()
	{
		Schema::drop('cars');
	}
}