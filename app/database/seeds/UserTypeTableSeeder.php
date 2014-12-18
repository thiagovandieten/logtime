<?php

class UserTypeTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$userType = new UserType();
		$userType->user_type = "Docent";
		$userType->save();

	}

}
