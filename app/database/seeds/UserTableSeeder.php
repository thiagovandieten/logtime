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
		$user->phone_number = '0651281477';
		$user->active = 1;
		$user->user_type_id = 1;
		$user->location_id = 1;
		$user->adress_id = 1;
		$user->project_group_id = 1;
		$user->save();

		$user = new User();
		$user->user_code = "10";
		$user->password = Hash::make("orangesource");
		$user->first_name = "Emiel";
		$user->last_name = "Snel";
		$user->email = "nktakumi@gmail.com";
		$user->phone_number = '0651281477';
		$user->active = 1;
		$user->user_type_id = 2;
		$user->location_id = 1;
		$user->adress_id = 1;
		$user->save();

        $user = new User();
		$user->user_code = "262503";
		$user->password = Hash::make("orangesource");
		$user->first_name = "Dennis";
		$user->last_name = "Eilander";
		$user->email = "eilander.dennis@gmail.com";
		$user->phone_number = '0651281477';
		$user->active = 1;
		$user->user_type_id = 1;
		$user->location_id = 1;
		$user->adress_id = 1;
		$user->project_group_id = 1;
		$user->save();

		$user = new User();
		$user->user_code = "42";
		$user->password = Hash::make("orangesource");
		$user->first_name = "Philip";
		$user->last_name = "Heemskerk";
		$user->email = "Heemskerkp3@gmail.com";
		$user->phone_number = '0651281477';
		$user->active = 1;
		$user->user_type_id = 1;
		$user->location_id = 1;
		$user->adress_id = 1;
		$user->project_group_id = 1;
		$user->save();
		// $this->call('UserTableSeeder');
	}

}
