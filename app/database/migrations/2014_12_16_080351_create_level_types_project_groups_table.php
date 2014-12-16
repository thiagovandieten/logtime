<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevelTypesProjectGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('level_types_project_groups', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('level_type_id')->unsigned();
            $table->foreign('level_type_id')->references('id')->on('level_types');
            $table->integer('project_group_id')->unsigned();
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
		Schema::drop('level_types_project_groups');
	}

}
