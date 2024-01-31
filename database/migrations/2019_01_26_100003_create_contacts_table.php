<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactsTable extends Migration {

	public function up()
	{
		Schema::create('contacts', function(Blueprint $table) {
			$table->timestamps();
			$table->increments('id');
			$table->string('name');
			$table->string('title');
			$table->string('email');
			$table->text('massage');
		});
	}

	public function down()
	{
		Schema::drop('contacts');
	}
}