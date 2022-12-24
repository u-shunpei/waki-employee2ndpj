<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Division;
use App\Models\Gender;
use App\Models\Kind;
use App\Models\Position;
use App\Models\User;
use App\Services\CheckExtensionServices;
use App\Services\FileUploadServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;
use Laravel\Socialite\Facades\Socialite;

class LoginWithGoogleController extends Controller
{
    const STATUS_KIND_USER = 2;

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver("google")->stateless()->user();
            $findUser = User::where("email", $user->email)->first();

            if ($findUser) {
                Auth::login($findUser);
                return redirect(route('showEmployeeList'));
            } else {
                $newUser = User::create([
                    "name" => $user->name,
                    "email" => $user->email,
                    "password" => encrypt("123456dummy"),
                    'kind_id' => self::STATUS_KIND_USER,
                ]);

                Auth::login($newUser);

                return redirect(route('showGoogleUserCreate', Auth::id()));
            }
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }

    public function showGoogleUserCreate($user_id)
    {
        $auth = Auth::user();
        $user = User::findorFail($user_id);
        $kinds = Kind::all();
        $genders = Gender::all();
        $positions = Position::all();
        $departments = Department::all();
        $divisions = Division::all();


        return view('google.googleUserCreate', compact('user', 'kinds', 'genders', 'positions', 'departments', 'divisions', 'auth'));
    }

    public function create(Request $request, $user_id)
    {
        $auth = Auth::user();
        $user = User::findorFail($user_id);

        if(!is_null($request['img_name'])){
            $imageFile = $request['img_name'];

            $list = FileUploadServices::fileUpload($imageFile);
            list($extension, $fileNameToStore, $fileData) = $list;

            $data_url = CheckExtensionServices::checkExtension($fileData, $extension);
            $image = Image::make($data_url);
            $image->resize(110,110)->save(storage_path() . '\app\public\images\ ' . $fileNameToStore );

            $user->img_name = $fileNameToStore;
        }

//        User::create([
//            'img_name' => $fileNameToStore,
//            'gender_id' => $request['gender_id'],
//            'kind_id' => $request['kind_id'],
//            'position_id' => $request['position_id'],
//            'department_id' => $request['department_id'],
//            'division_id' => $request['division_id'],
//        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender_id = $request->gender_id;
        $user->kind_id = $request->kind_id;
        $user->position_id = $request->position_id;
        $user->department_id = $request->department_id;
        $user->division_id = $request->division_id;

        $user->save();

        $request->session()->regenerateToken();

        return view('google.googleUserCreateSuccess', compact('auth'));
    }
}
