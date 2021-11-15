<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\UserRole;
use App\Notifications\RegistrationDemand;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'lastName' => ['required', 'string', 'max:255'],
            'firstName' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
        ])->validate();

        Notification::sendNow(
            User::where(
                'role_id',
                UserRole::where('name', UserRole::ADMIN_ROLE)->first()->id
            )->get(),
            new RegistrationDemand($input['lastName'], $input['firstName'], $input['email'])
        );

        return User::find(1);

        // return User::create([
        //     'firstName' => $input['firstName'],
        //     'lastName' => $input['lastName'],
        //     'email' => $input['email'],
        //     'password' => Hash::make(User::DEFAULT_PASSWORD),
        // ]);
    }
}
