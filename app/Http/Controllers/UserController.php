<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\UserRole;
use App\Notifications\RegistrationApproval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function index()
    {
        $users = User::with(['role'])->where('id', '!=', auth()->id())->get();
        $categories = Category::all();

        return view('users.index', compact(['users', 'categories']));
    }


    public function create()
    {
        return view('auth.register');
    }


    public function store(Request $request)
    {
        $userData = collect([
            'email', 'firstName', 'lastName',
        ])->combine(Str::of(Crypt::decrypt($request->get('token')))->explode(':'))->toArray();

        $userData['password'] = Hash::make(User::DEFAULT_PASSWORD);
        $userData['role_id'] = UserRole::where('name', UserRole::FORMATOR_ROLE)->first()->id;

        $user = User::create($userData);

        $user->notify(new RegistrationApproval());

        return view('users.subscription-success');
    }

    public function destroy($email)
    {
        User::where('email', $email)->delete();

        return redirect()->route('admin.users.index')->with(['success' => true]);
    }
}
