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

		$street->street = "Hertog Willemweg 23";
		$street->save();
	


		// $this->call('UserTableSeeder');
	}

}
