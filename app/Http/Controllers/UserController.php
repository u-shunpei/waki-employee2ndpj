<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Birth;
use App\Models\Birthday;
use App\Models\Department;
use App\Models\Division;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\FileUploadServices;
use App\Services\CheckExtensionServices;
use Intervention\Image\Facades\Image;
use function Sodium\compare;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::findorFail($id);

        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findorFail($id);
        $births = Birth::all();
        $birthdays = Birthday::all();
        $positions = Position::all();
        $departments = Department::all();
        $divisions = Division::all();

        return view('users.edit', compact('user', 'births', 'birthdays', 'positions', 'departments', 'divisions'));
    }

    public function update($id, ProfileRequest $request)
    {
        $users = User::findorFail($id);
        $user = User::findorFail($id);

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
        $users->birth_id = $request->birth_name;
        $users->birthday_id = $request->birthday_name;
        $users->position_id = $request->position_name;
        $users->department_id = $request->department_name;
        $users->division_id = $request->division_name;
        $users->tel = $request->tel;
        $users->work = $request->work;
        $users->skill = $request->skill;
        $users->hobby = $request->hobby;
        $users->target = $request->target;
        $users->self_introduction = $request->self_introduction;

        $users->save();




        return view('users.show', compact('user'));
    }
}
