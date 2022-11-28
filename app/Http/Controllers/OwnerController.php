<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function showUserList()
    {
        $auth = Auth::user();
        $users = User::paginate(10);

        return view('owner.userList', compact('auth', 'users'));
    }

    public function showUserDetail($user_id)
    {
        $auth = Auth::user();
        $user = User::findorFail($user_id);

        return view('owner.userDetail',  compact('auth', 'user'));
    }

    public function showUserCreate()
    {
        $auth = Auth::user();
        $user = User::all();

        return view('owner.userCreate', compact('auth', 'user'));
    }

    public function showUserEdit($user_id)
    {
        $auth = Auth::user();
        $user = User::findorFail($user_id);

        return view('owner.userEdit', compact('auth', 'user'));
    }

    public function edit(Request $request, $user_id)
    {
        $auth = Auth::user();
        $user = User::findorFail($user_id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->kind_id = $request->kind_id;

        $user->save();

        $request->session()->regenerateToken();

        return view('owner.userEditSuccess', compact('auth', 'user'));
    }

    public function delete(Request $request, $user_id)
    {
        $auth = Auth::user();
        $user = User::find($user_id);

        $user->delete();

        $request->session()->regenerateToken();

        return view('owner.userDeleteSuccess', compact('user', 'auth'));
    }
}
