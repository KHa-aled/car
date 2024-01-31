<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompaniesTable extends Migration {

	public function up()
	{
		Schema::create('companies', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('logo');
			$table->string('address');
			$table->text('details');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('companies');
	}
}