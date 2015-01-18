<?php

use Indatus\Dispatcher\Scheduling\ScheduledCommand;
use Indatus\Dispatcher\Scheduling\Schedulable;
use Indatus\Dispatcher\Drivers\Cron\Scheduler;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class BackupDBCommand extends ScheduledCommand {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'logtime:backup';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Simpele DB backupper';

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
	 * When a command should run
	 *
	 * @param Scheduler $scheduler
	 * @return \Indatus\Dispatcher\Scheduling\Schedulable
	 */
	public function schedule(Schedulable $scheduler)
	{
		return $scheduler;
//		return $scheduler->daily()->hours(23)->minutes(59);
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$dumpDirectory = __DIR__.'/../storage/dumps';
		$fi = new FilesystemIterator($dumpDirectory, FilesystemIterator::SKIP_DOTS);
		$backupCount = iterator_count($fi);
		if($backupCount > 3)
		{
			$this->removeBackup($dumpDirectory);
		}
		$this->call('db:backup');
	}

	public function removeBackup($dumpDirectory)
	{
		$files = File::files($dumpDirectory);
		File::delete($files[0]);
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
