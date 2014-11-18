<?php

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		$this->call('AdressTableSeeder');
		$this->call('LocationTableSeeder');
		$this->call('UserTypeTableSeeder');
		$this->call('ProjectGroupTableSeeder');

		$user = new User();
		$user->user_code = "256116";
		$user->password = Hash::make("orangesource");
		$user->first_name = "Thiago";
		$user->last_name = "van Dieten";
		$user->email = "nktakumi@gmail.com";
		$user->phone_number = 0651281477;
		$user->active = 1;
		$user->user_type_id = 1;
		$user->location_id = 1;
		$user->adress_id = 1;
		$user->save();
		// $this->call('UserTableSeeder');
	}

}
