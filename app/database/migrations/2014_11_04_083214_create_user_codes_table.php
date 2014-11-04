<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCodesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_codes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_type_id')->unsigned();
			$table->foreign('user_type_id')->references('id')->on('user_types');
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
		Schema::drop('user_codes');
	}

}
