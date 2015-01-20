<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasks', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('task_name',255);
			$table->integer('project_id')->unsigned();
			$table->foreign('project_id')->references('id')->on('projects');
			$table->integer('categorie_id')->unsigned();
			$table->foreign('categorie_id')->references('id')->on('categories');
			$table->integer('level_type_id')->unsigned();
            $table->foreign('level_type_id')->references('id')->on('level_types');
            $table->integer('project_group_id')->nullable()->unsigned();
            $table->foreign('project_group_id')->references('id')->on('project_groups');
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
		Schema::drop('tasks');
	}

}
