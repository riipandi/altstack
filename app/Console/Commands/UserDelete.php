<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class UserDelete extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'user:delete {user : The ID of the user to remove} {--force : Force delete user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove an existing laravel user';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $identity = $this->argument('user');
        $fieldType = filter_var($identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $user = User::where($fieldType, '=', $identity)->firstOrFail();

        // TODO: Add exception for administrator user.
        // if ($user->id == 1) {
        //     $this->warning(PHP_EOL.'Administrator can\'t be deleted!');
        //     exit;
        // }

        if ($this->confirm('Are you sure you want to remove '.$identity.'?')) {
            if ($this->option('force')) {
                $user->forceDelete();
            } else {
                $user->delete();
            }

            $this->info('User "'.$identity.'" deleted.');
        }
    }
}
