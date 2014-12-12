<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevelTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('level_types', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('level_type_name', 255);
			$table->integer('project_group_id')->unsigned()->nullable();
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
		Schema::drop('level_types');
	}

}
