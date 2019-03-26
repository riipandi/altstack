<?php

namespace App\Handler;

use App\Models\SocialiteAccount;
use App\Models\User;
use App\Notifications\SocialRegistered as RegisteredNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialiteHandler
{

    use Notifiable;

    public function createOrGetUser(ProviderUser $providerUser, $provider)
    {
        $account = SocialiteAccount::whereProvider($provider)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {
            $account = new SocialiteAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider'         => $provider,
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {

                // Get username from provider, if not available generate it.
                $nameParser = new \TheIconic\NameParser\Parser();
                $firstName = $nameParser->parse($providerUser->getName())
                    ->getFirstname();

                if (!$providerUser->getNickname()) {
                    $providedUsername = $firstName.Str::random(4);
                    $providedUsername = Str::slug($providedUsername, '_');
                } else {
                    $providedUsername = $providerUser->getNickname();
                }

                $temporaryPassword = str_random(8);
                $user = User::create([
                    'username'          => $providedUsername,
                    'email'             => $providerUser->getEmail(),
                    'name'              => $providerUser->getName(),
                    'avatar'            => $providerUser->getAvatar(),
                    'password'          => $temporaryPassword,
                    'email_verified_at' => now(),
                ]);

                // Notify user via email and send temporary password
                $user->notify(new RegisteredNotification($temporaryPassword));
            }

            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
}
