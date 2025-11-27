<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('Backend.login');
    }

    public function postlogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $data = $request->only('email', 'password');

        if (Auth::attempt($data)) {
            $user = Auth::user();
            echo $user->level;
        } else {
            echo 'gagal';
        }
    }
}
