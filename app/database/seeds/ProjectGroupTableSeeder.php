<?php

class ProjectGroupTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		$this->call('YearTableSeeder');
		$projectGroup = new ProjectGroup();
		$projectGroup->name = "Orange Source";
		$projectGroup->active = 1;
		$projectGroup->adress_id = 1;
		$projectGroup->year_id = 1;
		$projectGroup->save();
		// $this->call('UserTableSeeder');
	}

}