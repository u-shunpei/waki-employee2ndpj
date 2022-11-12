<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Division;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::Paginate(4);
        $auth = Auth::user();

        return view('home', compact('users', 'auth'));
    }

    public function showDetail($user_id)
    {
        $user = User::findorFail($user_id);
        if (is_null($user)) {
            return 'エラー';
        }
        $auth = Auth::user();


        return view('detail', compact('user', 'auth'));
    }

    public function search(Request $request)
    {
        $user = User::Pagenate(4);
        $users = User::searchShops($request->department_id, $request->division_id, $request->name);
//        $departments = Department::all();
//        $divisions = Division::all();
        $auth = Auth::user();
        return view('home', compact('users','auth', 'user'));
    }
}
