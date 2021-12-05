<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserProfileController extends Controller
{
    public function showProfil()
    {
        return view('users.profile');
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $params = $request->validated();

        $newFields = [];

        if ($params['email']) {
            $newFields['email'] = $params['email'];
        }

        if ($params['avatar']) {
            $newFields['avatar'] = Str::replaceArray(
                '?', [strtotime('now'), $request->file('avatar')->extension()],
                User::AVATAR_IMAGE_NAME_PATTERN
            );

            if (Storage::exists($newFields['avatar'])) {
                Storage::delete($newFields['avatar']);
            }

            $request->file('avatar')->storeAs(
                'public',
                $newFields['avatar']
            );
        }

        if (count($newFields) > 0) {
            User::where('id', auth()->user()->getAuthIdentifier())
                ->update($newFields);
        }

        return redirect()->route('user.profile.show')->with(['success' => count($newFields) > 0]);
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $params = $request->validated();

        User::where('id', auth()->user()->getAuthIdentifier())
            ->update(['password' => Hash::make($params['new_password'])]);

        return redirect()->route('user.profile.show')->with(['success' => true]);
    }
}
