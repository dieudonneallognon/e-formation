<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use App\Notifications\RegistrationApproval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminUserController extends Controller
{
    public function __invoke(Request $request)
    {
        $userData = collect([
            'email', 'firstName', 'lastName',
        ])->combine(Str::of(Crypt::decrypt($request->get('token')))->explode(':'))->toArray();

        $userData['password'] = Hash::make(User::DEFAULT_PASSWORD);
        $userData['role_id'] = UserRole::where('name', UserRole::FORMATOR_ROLE)->first()->id;

        $user = User::create($userData);

        $user->notify(new RegistrationApproval());

        return view('users.subsrciption-success');
    }
}
