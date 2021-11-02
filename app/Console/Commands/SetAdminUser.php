<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class SetAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:set-admin-user {userId} {--disable}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make user is admin';

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
     * @return int
     */
    public function handle()
    {
        $obUser = User::findOrFail($this->argument('userId'));
        $obUser->is_admin = $this->option('disable') ? false : true;
        $obUser->save();

        return Command::SUCCESS;
    }
}
