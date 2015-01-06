<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
        $this->call('ProjectTableSeeder');
		$this->call('GroupProjectPeriodeTableSeeder');
		$this->call('EstimatedTimeTableSeeder');
		// $this->call('StudentWageTableSeeder');
	}

}
