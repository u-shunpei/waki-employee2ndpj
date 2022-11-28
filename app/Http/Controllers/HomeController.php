<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Division;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class HomeController extends Controller
{
    const STATUS_KIND_ID_OWNER = 1;
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
        $users = User::all();
        $auth = Auth::user();

        return view('home', compact('users', 'auth'));
    }

    public function showDetail($user_id)
    {
        $users = User::all();
        $person = User::findorFail($user_id);
        if (is_null($person)) {
            return 'エラー';
        }
        $auth = Auth::user();


        return view('detail', compact('person', 'auth', 'users'));
    }

    public function search(Request $request)
    {
        $users = User::searchShops($request->department_id, $request->division_id, $request->name);
        $auth = Auth::user();
        return view('home', compact('users','auth'));
    }
}
