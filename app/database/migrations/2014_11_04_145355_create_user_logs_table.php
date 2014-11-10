<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_logs', function(Blueprint $table)
		{
			$table->increments('id');
            $table->timestamp('start_time');
            $table->timestamp('stop_time');
            $table->text('description');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('project_task_id')->unsigned()->nullable();
            $table->foreign('project_task_id')->references('id')->on('project_tasks');
            $table->integer('user_project_task_id')->unsigned()->nullable();
            $table->foreign('user_project_task_id')->references('id')->on('user_project_tasks');
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
		Schema::drop('user_logs');
	}

}
