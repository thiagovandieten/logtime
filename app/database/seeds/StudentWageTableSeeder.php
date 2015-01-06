<?php
class StudentWageTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$studentwage = new StudentWage();
		$studentwage->wage = 12.42;
		$studentwage->project_group_id = 1;
		$studentwage->save();

	}

}