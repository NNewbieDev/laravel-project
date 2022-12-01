<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function _construct()
    {
        @session_start();
    }
    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        if ($request->username == ''  || $request->password == '') {
            return redirect('/login')->with('notice', 'Tài khoản 
            hoặc mật khẩu không được để trống.');
        }
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            // return redirect()->route('author.index');
            return redirect('/admin/home');
        } else {
            return redirect('/login')->with('notice', 'Tài khoản
             hoặc mật khẩu chưa chính xác vui lòng thử lại!');
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('/login');
    }
}