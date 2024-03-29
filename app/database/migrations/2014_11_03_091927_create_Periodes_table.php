<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('periodes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date("start_date");
			$table->date("stop_date");
			$table->string("periode_name");
			$table->integer('location_id')->unsigned();
            $table->foreign('location_id')->references('id')->on('locations');
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
		Schema::drop('periodes');
	}

}
