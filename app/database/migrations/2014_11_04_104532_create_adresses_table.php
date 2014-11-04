<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adresses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('street_id')->unsigned();
            $table->foreign('street_id')->references('id')->on('streets');
			$table->integer('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('cities');
			$table->integer('house_number');
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
		Schema::drop('adresses');
	}

}
