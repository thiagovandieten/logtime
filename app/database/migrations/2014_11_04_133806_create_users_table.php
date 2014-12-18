<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('user_code',255);
			$table->string('password',255);
			$table->string('first_name',255);
			$table->string('last_name',255);
			$table->string('email',255);
			$table->integer('phone_number');
			$table->string('user_image_path',255)->default('placeholder.png');
			$table->boolean('active')->default(true);
			$table->timestamp('last_time_online');
            $table->rememberToken();
			$table->integer('user_type_id')->unsigned();
			$table->foreign('user_type_id')->references('id')->on('user_types');
            $table->integer('location_id')->unsigned();
            $table->foreign('location_id')->references('id')->on('locations');
            $table->integer('project_group_id')->unsigned()->nullable();
            $table->foreign('project_group_id')->references('id')->on('project_groups');
            $table->integer('adress_id')->unsigned();
            $table->foreign('adress_id')->references('id')->on('adresses');
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
		Schema::drop('users');
	}

}
