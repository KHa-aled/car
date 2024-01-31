<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyDayTable extends Migration {

	public function up()
	{
		Schema::create('company_day', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('company_id');
			$table->integer('day_id');
			$table->time('start');
			$table->time('end');
		});
	}

	public function down()
	{
		Schema::drop('company_day');
	}
}