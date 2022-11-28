<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Intervention\Image\Facades\Image;
use App\Services\CheckExtensionServices;
use App\Services\FileUploadServices;

class RegisterController extends Controller
{
    const STATUS_KIND_ID_OWNER = 1;
    const STATUS_KIND_ID_USER = 2;
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'self_introduction' => ['string', 'max:255'],
            'img_name' => ['file', 'image', 'mimes:jpeg,png,jpg,gif,jfif', 'max:2000'], //この行を追加します
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $users = User::all();

        if (!is_null($data['img_name'])){
            $imageFile = $data['img_name'];

            $list = FileUploadServices::fileUpload($imageFile); //変更

            list($extension, $fileNameToStore, $fileData) = $list; //変更

            $data_url = CheckExtensionServices::checkExtension($fileData, $extension);

            $image = Image::make($data_url);

            $image->resize(110, 110)->save(storage_path() . '\app\public\images\ ' . $fileNameToStore);

            $users->img_name = $imageFile;
        }


        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'self_introduction' => $data['self_introduction'],
            'img_name' => $fileNameToStore,
            'kind_id' => $data['kind_id'],
        ]);
    }
}


