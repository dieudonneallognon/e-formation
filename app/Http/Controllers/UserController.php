<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showProfil()
    {
        return view('users.profile');
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $params = $request->validated();

        if ($email = $params['email']) {
            $user = User::find(auth()->user()->id);
            $user->email = $email;
            $user->save();
        }

        return redirect()->route('user.profile.show')->with(['success' => $email]);
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $params = $request->validated();

        $user = User::find(auth()->user()->id);

        $user->password = Hash::make($params['new_password']);

        $user->save();

        return redirect()->route('user.profile.show')->with(['success' => true]);
    }
}
