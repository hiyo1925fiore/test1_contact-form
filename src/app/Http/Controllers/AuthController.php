<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.admin');
    }

    public function register(AuthRequest $request)
    {
        // usersテーブルに入力内容を格納
        $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        ]);

        // ログインページに遷移する
        return view('auth.login');
    }

    public function login(AuthRequest $request)
    {
        $user = User::find($request->email);
        Auth::login($user);

        // 管理画面に遷移する
        return redirect()->intended('auth.admin');
    }
}
