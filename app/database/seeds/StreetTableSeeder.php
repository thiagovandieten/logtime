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

		$street->street = "";
		$street->house_number = "";
		$street->save();

	}

}
