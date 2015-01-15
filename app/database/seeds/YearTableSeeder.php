<?php

class YearTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		$year = new Year();
		$year->year = "2011-08-01";
		$year->nickname = "Lions";
		$year->location_id = 1;
		$year->save();
	}

}
