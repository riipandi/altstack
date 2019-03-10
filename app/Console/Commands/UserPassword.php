<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Validator;

class UserPassword extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'user:password {username : The username of the user to change}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change user password';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $identity = $this->argument('username');

        $user = User::where('username', '=', $identity)->first();

        if ($user === null) {
            $this->error(PHP_EOL.'User "'.$identity.'" not found.');
            exit;
        }

        $password = $this->validateAsk('Enter user password', ['password' => 'string|min:6']);

        $user->password = $password;
        $user->save();
        $this->info('Password for "'.$identity.'" changed.');
    }

    public function validateAsk($question, $rules)
    {
        $value = $this->ask($question);
        $validate = $this->validateInput($rules, $value);
        if ($validate !== true) {
            $this->error($validate);
            $value = $this->validateAsk($question, $rules);
        }

        return $value;
    }

    public function validateInput($rules, $value)
    {
        $validator = Validator::make([key($rules) => $value], $rules);
        if ($validator->fails()) {
            return $error = $validator->errors()->first(key($rules));
        }

        return true;
    }
}
