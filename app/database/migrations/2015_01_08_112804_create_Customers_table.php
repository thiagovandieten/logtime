<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Customers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('project_group_id')->unsigned();
            $table->foreign('project_group_id')->references('id')->on('project_groups');
            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('projects');
            $table->integer('adress_id')->unsigned()->nullable();
            $table->foreign('adress_id')->references('id')->on('adresses');
            $table->string('customer_name',255);
            $table->string('companie',255);
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
		Schema::drop('Customers');
	}

}
