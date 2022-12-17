<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Department;
use App\Models\Division;
use App\Models\Position;
use App\Models\User;
use http\Params;
use Illuminate\Http\Request;
use App\Services\FileUploadServices;
use App\Services\CheckExtensionServices;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function redirect()
    {
        return redirect(route('showEmployeeList'));
    }

    public function index()
    {
        $users = User::all();
        $auth = Auth::user();

        return view('users.list', compact('users', 'auth'));
    }

    public function showDetail($user_id, $file_name = "counter.dat")
    {
        $users = User::all();
        $person = User::findorFail($user_id);
        if (is_null($person)) {
            return 'エラー';
        }
        $auth = Auth::user();

        if (file_exists($file_name)) {

            $handle = fopen($file_name, "r");
            $count = (int)fread($handle, 20) + 1;

            $handle = fopen($file_name, 'w');
            fwrite($handle, $count);

            fclose($handle);
        } else {
            $handle = fopen($file_name , "w+");

            $count = 1;

            fwrite($handle, $count);
            fclose($handle);
        }

        return view('users.detail', compact('person', 'auth', 'users', 'count'));
    }

    public function search(Request $request)
    {
        $users = User::searchShops($request->department_id, $request->division_id, $request->name);
        $auth = Auth::user();
        return view('users.list', compact('users','auth'));
    }

    public function edit($auth_id)
    {
        $auth = Auth::user();
        $user = User::findorFail($auth_id);
        $positions = Position::all();
        $departments = Department::all();
        $divisions = Division::all();

        return view('users.edit', compact('auth', 'user', 'positions', 'departments', 'divisions'));
    }

    public function update($auth_id, ProfileRequest $request)
    {
        $users = User::findorFail($auth_id);
        $user = User::findorFail($auth_id);
        $auth = Auth::user();

        if(!is_null($request['img_name'])){
            $imageFile = $request['img_name'];

            $list = FileUploadServices::fileUpload($imageFile);
            list($extension, $fileNameToStore, $fileData) = $list;

            $data_url = CheckExtensionServices::checkExtension($fileData, $extension);
            $image = Image::make($data_url);
            $image->resize(1000,1000)->save(storage_path() . '\app\public\images\ ' . $fileNameToStore );

            $users->img_name = $fileNameToStore;
        }

        $users->name = $request->name;
        $users->nickname = $request->nickname;
        $users->birthday = $request->birthday;
        $users->tel = $request->tel;
        $users->work = $request->work;
        $users->skill = $request->skill;
        $users->hobby = $request->hobby;
        $users->target = $request->target;
        $users->self_introduction = $request->self_introduction;

        $users->save();

        return view('users.editSuccess', compact('user', 'auth'));
    }
}
