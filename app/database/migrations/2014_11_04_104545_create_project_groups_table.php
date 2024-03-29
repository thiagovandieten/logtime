<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('project_groups', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('year_id')->unsigned();
            $table->foreign('year_id')->references('id')->on('years');
            $table->integer('adress_id')->unsigned()->nullable();
            $table->foreign('adress_id')->references('id')->on('adresses');
            $table->integer('location_id')->unsigned();
            $table->foreign('location_id')->references('id')->on('locations');
            $table->integer('coach_id')->unsigned()->nullable();
			$table->integer('leader_id')->unsigned()->nullable();
            $table->boolean('active')->default(true);
			$table->string('code', 45);
			$table->string('name', 255);
			$table->string('image_path', 255)->default('placeholder.png');
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
		Schema::drop('project_groups');
	}

}
