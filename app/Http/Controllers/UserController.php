<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {

        $users = User::all();

        return view('users.index', compact('users'));
    }

    // public function logout(){
    //      Session::flush();

    //     Auth::logout();

    //     return redirect('login');
    // }
}
