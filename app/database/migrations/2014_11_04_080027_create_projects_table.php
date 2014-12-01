<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('project_name',255);
			$table->boolean('active')->default(true);
			$table->integer('project_method_id')->unsigned();
			$table->foreign('project_method_id')->references('id')->on('project_methods');
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
		Schema::drop('projects');
	}

}