<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Brian2694\Toastr\Facades\Toastr;
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
            Toastr::warning('Tài khoản hoặc mật khẩu không được để trống!', 'Thất bại');
            return back();
        }
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            Toastr::success('Đăng nhập thành công!', 'Thành công');
            return redirect('/admin/home');
        } else {
            Toastr::warning('Tài khoản hoặc mật khẩu không chính xác!', 'Thất bại');
            return back();
        }
    }

    public function getLogout()
    {
        Auth::logout();
        Toastr::success('Đăng xuất thành công!', 'Thành công');
        return redirect('/login');
    }
}