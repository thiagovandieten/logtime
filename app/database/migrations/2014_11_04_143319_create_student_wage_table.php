<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentWageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('student_wage', function(Blueprint $table)
		{
			$table->increments('id');
            $table->double('wage', 10 , 2);
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
		Schema::drop('student_wage');
	}

}
