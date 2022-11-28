<?php

namespace App\Http\Controllers;

use App\Models\Kind;
use App\Models\User;
use App\Services\CheckExtensionServices;
use App\Services\FileUploadServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

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
        $kinds = Kind::all();

        return view('owner.userCreate', compact('auth', 'user', 'kinds'));
    }

    public function create(Request $request)
    {
        $auth = Auth::user();
        $users = User::all();

        if (!is_null($request['img_name'])){
            $imageFile = $request['img_name'];

            $list = FileUploadServices::fileUpload($imageFile); //変更

            list($extension, $fileNameToStore, $fileData) = $list; //変更

            $data_url = CheckExtensionServices::checkExtension($fileData, $extension);

            $image = Image::make($data_url);

            $image->resize(110, 110)->save(storage_path() . '\app\public\images\ ' . $fileNameToStore);

            $users->img_name = $imageFile;
        }

        User::create([
            'img_name' => $fileNameToStore,
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'kind_id' => $request['kind_id'],
        ]);

        return view('owner.userCreateSuccess', compact('auth'));
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
