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
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;

class OwnerController extends Controller
{
    const STATUS_PAGINATE = 10;

    public function showUserList(Request $request)
    {
        $auth = Auth::user();
        $genders = Gender::all();
        $users = User::order($request->sort);

        return view('owner.userList', compact('auth', 'genders', 'users'));
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
        $genders = Gender::all();
        $positions = Position::all();
        $departments = Department::all();
        $divisions = Division::all();

        return view('owner.userCreate', compact('auth', 'user', 'kinds', 'genders', 'positions', 'departments', 'divisions'));
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
            'gender_id' => $request['gender_id'],
            'kind_id' => $request['kind_id'],
            'position_id' => $request['position_id'],
            'department_id' => $request['department_id'],
            'division_id' => $request['division_id'],
        ]);

        return view('owner.userCreateSuccess', compact('auth'));
    }

    public function showUserEdit($user_id)
    {
        $auth = Auth::user();
        $user = User::findorFail($user_id);
        $genders = Gender::all();
        $kinds = Kind::all();
        $positions = Position::all();
        $departments = Department::all();
        $divisions = Division::all();

        return view('owner.userEdit', compact('auth', 'user', 'genders', 'kinds', 'positions', 'departments', 'divisions'));
    }

    public function edit(Request $request, $user_id)
    {
        $auth = Auth::user();
        $user = User::findorFail($user_id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender_id = $request->gender_id;
        $user->kind_id = $request->kind_id;
        $user->position_id = $request->position_id;
        $user->department_id = $request->department_id;
        $user->division_id = $request->division_id;

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

    public function search(Request $request)
    {
        $users = User::searchUsers($request->name, $request->gender_id);
        $genders = Gender::all();
        $auth = Auth::user();
        return view('owner.userList', compact('users','auth', 'genders'));
    }

    public function download()
    {
        $users = User::all();
        $stream = fopen('php://temp', 'w');   //ストリームを書き込みモードで開く
        $arr = array('id', 'name', 'email', '種別', '生年月日');           //CSVファイルのカラム（列）名の指定

        fputcsv($stream, $arr);               //1行目にカラム（列）名のみを書き込む（繰り返し処理には入れない）
        foreach ($users as $user) {
            $arrInfo = array(
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                '種別' => $user->kind->name,
                '生年月日' => $user->birthday,
            );
            fputcsv($stream, $arrInfo);       //DBの値を繰り返し書き込む
        }

        rewind($stream);                      //ファイルポインタを先頭に戻す
        $csv = stream_get_contents($stream);  //ストリームを変数に格納
        $csv = mb_convert_encoding($csv, 'sjis-win', 'UTF-8');   //文字コードを変換

        fclose($stream);                      //ストリームを閉じる

        $headers = array(                     //ヘッダー情報を指定する
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=test.csv'
        );

        return Response::make($csv, 200, $headers);   //ファイルをダウンロードする
    }
}
