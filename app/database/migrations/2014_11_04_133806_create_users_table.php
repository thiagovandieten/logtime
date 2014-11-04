<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('location_id')->unsigned();
			$table->integer('class_id')->unsigned();
			$table->integer('adress_id')->unsigned();
			$table->string('user_code');
			$table->string('password');
			$table->string('first_name',255);
			$table->string('last_name',255);
			$table->string('email',255);
			$table->integer('phone_number');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
