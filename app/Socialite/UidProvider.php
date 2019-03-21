<?php

namespace App\Socialite;

use Illuminate\Support\Arr;
use Laravel\Socialite\Two\AbstractProvider;
use Laravel\Socialite\Two\ProviderInterface;
use Laravel\Socialite\Two\User;

class UidProvider extends AbstractProvider implements ProviderInterface
{
    /**
     * The scopes being requested.
     *
     * @var array
     */
    protected $scopes = [
        'basic',
        'email',
        'phone',
        'address_ktp',
        'address_domicile',
        'legitimacy',
    ];

    protected $scopeSeparator = ' ';

    /**
     * Get the authentication URL for the provider.
     *
     * @param string $state
     *
     * @return string
     */
    protected function getAuthUrl($state)
    {
        return $this->buildAuthUrlFromBase('https://u.id/oauth/authorize', $state);
    }

    /**
     * Get the token URL for the provider.
     *
     * @return string
     */
    protected function getTokenUrl()
    {
        // return 'https://api.u.id/oauth/token';
        return 'https://api.u.id/oauth/token?'.http_build_query([
            'grant_type' => 'authorization_code',
        ]);
    }

    /**
     * Get the raw user for the given access token.
     * TODO:Response still null, waiting for fix from the provider.
     *
     * @param string $token
     *
     * @return array
     */
    protected function getUserByToken($token)
    {
        $userUrl = 'https://u.id/api/v1.0/user/info/self';

        $response = $this->getHttpClient()->get($userUrl, [
            'headers' => [
                'Accept'           => 'application/json',
                'Authorization'    => 'Bearer '.$token,
                'X-Requested-With' => 'XMLHttpRequest',
            ],
        ]);

        $user = json_decode($response->getBody()->getContents(), true);

        return $user;
    }

    /**
     * Map the raw user array to a Socialite User instance.
     *
     * @param array $user
     *
     * @return \Laravel\Socialite\User
     */
    protected function mapUserToObject(array $user)
    {
        return (new User())->setRaw($user)->map([
            'id'       => $user['id'],
            'nickname' => $user['nik'],
            'name'     => Arr::get($user, 'name'),
            'email'    => $user['email'],
            'phone'    => $user['phone'],
            'avatar'   => $user['photo'],
        ]);
    }

    protected function getTokenFields($code)
    {
        return array_merge(parent::getTokenFields($code), [
            'grant_type' => 'authorization_code',
        ]);
    }
}
