<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;

class AuthorController extends Controller
{
    //
    private $users;
    public function __construct()
    {
        $this->users = new Employees();
    }
    public function index()
    {
        $title = "Trang Chủ";
        $msg = "Load list users successfully";
        $users = $this->users->getAllUser();
        return view('author.index', compact('title', 'users', 'msg'));
    }

    public function postNews()
    {
        $title = "Thêm users";
        return view('author.post', compact('title'));
    }

    public function postedNews(Request $request)
    {

        $request->validate(
            [
                'fullname' => 'required|min:8',
                'email' => 'required|email|unique:users',
            ],
            [
                'fullname.required' => 'Vui lòng nhập đầy đủ họ tên',
                'fullname.min' => 'Ký tự không đủ',
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Email không đúng định dạng',
                'email.unique' => 'Email đã tồn tại',
            ]
        );

        $data = [
            'username' => $request->fullname,
            'email' => $request->email,
            'create_at' => date('Y-m-d H:i:s')
        ];
        $this->users->addUser($data);
        return redirect()->route('author.index');
    }

    public function managementNews()
    {
        return view('author.management');
    }

    public function editInformation($id)
    {
        $title = "Sua thong tin ";
        $msg = "Load information user successfully";
        $user = $this->users->getUser($id);
        if (!empty($user[0])) {
            $user = $user[0];
            return view('author.editInfo', compact('title', 'user', 'msg'));
        } else {
            return redirect()->route('author.index');
        }
    }

    public function editedInformation($id, Request $request)
    {
        $request->validate(
            [
                'fullname' => 'required|min:8',
                'email' => 'required|email|'
            ],
            [
                'fullname.required' => 'Vui lòng nhập đầy đủ họ tên',
                'fullname.min' => 'Ký tự không đủ',
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Email không đúng định dạng',
                // 'email.unique' => 'Email đã tồn tại'
            ]
        );

        $data = [
            'userid' => $id,
            'username' => $request->fullname,
            'email' => $request->email,
            'create_at' => date('Y-m-d H:i:s')
        ];
        $this->users->updateUser($data);
        return redirect()->route('author.index');
    }

    public function destroyUser($id)
    {
        $this->users->destroyUser($id);
        return redirect()->route('author.index');
    }
}