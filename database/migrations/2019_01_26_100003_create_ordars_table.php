<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdarsTable extends Migration {

	public function up()
	{
		Schema::create('ordars', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->tinyInteger('provide_driver')->default('0');
			$table->integer('child_seats');
			$table->tinyInteger('additional_driver');
			$table->string('car_place');
			$table->float('insurance');
			$table->integer('age_driver');
			$table->integer('code_number');
		});
	}

	public function down()
	{
		Schema::drop('ordars');
	}
}