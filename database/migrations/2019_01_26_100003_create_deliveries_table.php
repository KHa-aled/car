<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeliveriesTable extends Migration {

	public function up()
	{
		Schema::create('deliveries', function(Blueprint $table) {
			$table->increments('id');
			$table->string('receiving_address');
			$table->time('receiving_date');
			$table->time('receiving_time');
			$table->tinyInteger('return_car')->default('0');
			$table->string('delivery_address');
			$table->date('delivery_date');
			$table->time('delivery_time');
			$table->tinyInteger('car_place');
			$table->timestamps();
			$table->integer('client_id');
			$table->integer('company_id');
		});
	}

	public function down()
	{
		Schema::drop('deliveries');
	}
}