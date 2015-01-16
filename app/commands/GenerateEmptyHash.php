<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class EmptyHash extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'emptyhash';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Vul alle lege wachtwoord velden in de DB met een hash';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$users = User::where('password', '=', '')->get();
		$users->each(function($user) {
			$user->password = Hash::make('');
			$user->save();
		});
	}

//	/**
//	 * Get the console command arguments.
//	 *
//	 * @return array
//	 */
//	protected function getArguments()
//	{
//		return array(
//			array('example', InputArgument::REQUIRED, 'An example argument.'),
//		);
//	}
//
//	/**
//	 * Get the console command options.
//	 *
//	 * @return array
//	 */
//	protected function getOptions()
//	{
//		return array(
//			array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
//		);
//	}

}
