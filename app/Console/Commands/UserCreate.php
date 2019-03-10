<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\UserAccountCreated as UserAccountCreatedNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserCreate extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'user:create';
    /**
     * The console command description.
     *
     * @var string
     */

    protected $description = 'Create a new application user';
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $first_name = $this->validateAsk('First Name', ['first_name' => 'string|max:255']);
        $last_name  = $this->validateAsk('Last Name', ['last_name' => 'string|max:255']);
        $username   = $this->validateAsk('Username', ['username' => 'alpha_dash|min:4|max:40|unique:users,username']);
        $email      = $this->validateAsk('Email address', ['email' => 'string|email|max:255|unique:users']);

        if ($this->confirm('Do you wish to create a random password?')) {
            $password = str_random(8);
            $this->info('*The randomly created password is: '.$password);
        } else {
            $password = $this->validateAsk('Enter user password', ['password' => 'string|min:6']);
        }

        $user = new User();
        $user->first_name = $first_name;
        $user->last_name  = $last_name;
        $user->email      = $email;
        $user->username   = $username;
        $user->password   = $password;
        $user->email_verified_at = now();
        $user->remember_token    = Str::random(24);
        $user->save();

        // TODO: Create notification for user:create command.
        // if ($this->confirm('Do you wish to send the user a notification?')) {
        //     $user->notify(new UserAccountCreatedNotification($password));
        //     $this->info('Email sent.');
        // }

        $this->info('New user created!'.PHP_EOL);
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
