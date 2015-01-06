<?php

class StreetTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$street = new Street();

		$street->street = "Hertog Willemweg";
		$street->house_number = "23";
		$street->save();

	}

}
