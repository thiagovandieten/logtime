<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupProjectCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('group_project_categories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('group_project_periode_id')->unsigned();
			$table->foreign('group_project_periode_id')->references('id')->on('group_project_periode');
			$table->integer('categorie_id')->unsigned();
			$table->foreign('categorie_id')->references('id')->on('categories');
			$table->boolean('is_done');
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
		Schema::drop('group_project_categories');
	}

}
