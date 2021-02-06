<?php

namespace App\Actions\Fortify;

use App\Traits\ImageUploadTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    use ImageUploadTrait;

    /**
     * Validate and update the given user's profile information.
     *
     * @param mixed $user
     * @param array $input
     *
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:1024'],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
        ])->validateWithBag('updateProfileInformation');

        if ($input['avatar']) {
            $fileName = $this->generateFileNameToStore($input['avatar']);
            $this->storeImageFile($input['avatar'], 'public/avatars', $fileName, 500);
            $user->avatar = $fileName;
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name'  => $input['name'],
                'email' => $input['email'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param mixed $user
     * @param array $input
     *
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name'              => $input['name'],
            'email'             => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
