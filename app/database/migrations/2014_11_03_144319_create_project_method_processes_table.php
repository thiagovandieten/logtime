<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectMethodProcessesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('project_method_processes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('project_method_id')->unsigned();
			$table->foreign('project_method_id')->references('id')->on('project_methods');
			$table->integer('project_method_proces_categorie_id')->unsigned();
			$table->foreign('project_method_proces_categorie_id','pro_met_pro_cat_foreign')->references('id')->on('project_method_proces_categories');
			$table->string('proces_name',255);
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
		Schema::drop('project_method_processes');
	}

}