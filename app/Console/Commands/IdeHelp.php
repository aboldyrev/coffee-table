<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class IdeHelp extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'ide-help';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle() {
		$this->call('ide-helper:generate');
		$this->call('ide-helper:meta');
		$this->call('ide-helper:models');
	}
}
