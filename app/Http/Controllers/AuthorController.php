<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\News;
use App\Models\Page;
use App\Models\PostProcess;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;

class AuthorController extends Controller
{
    private $news;
    private $postProcess;
    private $darkMode = false;
    public function __construct()
    {
        $this->news = new News();
        $this->postProcess = new PostProcess();
        @session_start();
    }

    public function index()
    {
        $title = "Tài khoản";
        $darkMode   = $this->darkMode;
        return view("author.index", compact("title", "darkMode"));
    }

    public function addNews()
    {
        $title = "Tạo bài viết mới";
        $category = Category::all();
        $darkMode = $this->darkMode;
        return view("author.addNews", compact("title", "category", "darkMode"));
    }

    public function postNews(Request $request)
    {
        $request->validate([
            'page_id' => "required",
            'title_news' => "required|max:255",
            'content_news' => "required|min:50",
            'image_news' => "required",
        ], [
            "page_id.required" => "Hãy chọn thể loại bài viết",
            "title_news.required" => "Hãy nhập tiều đề bài viết.",
            "title_news.max" => "Số kí tự vượt quá mức tối đa.",
            "content_news.required" => "Hãy nhập nội dung bài viết.",
            "content_news.min" => "Số kí tự cho nội dung quá ít.",
            "image_news.required" => "Hãy chọn ảnh làm bìa nội dung.",
        ]);
        $image = $request->file('image_news');
        $storedPath = $image->move('images', $image->getClientOriginalName());
        $authId = $this->authorID;
        $data = [
            'news_title' => $request->title_news,
            'news_content' => $request->content_news,
            'page_id' => $request->page_id,
            'post_at' => date("Y:m:d H:i:s"),
            'news_author' => $authId,
            'path_image' => $storedPath
        ];
        $this->news->addNews($data);
        $this->postProcess->addPost($data);
        return redirect()->route('author.index');
    }

    public function listNews()
    {
        $title = "Bài viết của tôi";
        $newsList = $this->news->getAllNews();
        $darkMode = $this->darkMode;
        return view("author.listNews", compact("title", "newsList", "darkMode"));
    }

    public function changePassword()
    {
        $title = "Quản lí mật khẩu";
        $darkMode = $this->darkMode;
        return view("author.managementAccount.password", compact("title", "darkMode"));
    }

    public function changedPassword(Request $request)
    {
        $request->validate([
            'old_password' => "required|min:8",
            'new_password' => "required|min:8|confirmed",
            'new_password_confirmation' => "required|min:8"
        ], [
            "old_password.required" => "Hãy nhập mật khẩu cũ.",
            "old_password.min" => "Tối thiểu 8 kí tự",
            "new_password.required" => "Hãy nhập mật khẩu mới.",
            "new_password.min" => "Tối thiểu 8 kí tự.",
            "new_password.confirmed" => "Mật khẩu không trùng khớp với mật khẩu xác nhận.",
            "new_password_confirmation.required" => "Hãy nhập lại mật khẩu mới.",
            "new_password_confirmation.min" => "Tối thiểu 8 kí tự",
        ]);
        if (!Hash::check($request->old_password, Auth::user()->password)) {
            Toastr::warning('Mật khẩu không chính xác!', 'Sai mật khẩu');
            return back();
        }
        $flag = User::whereId(Auth::id())->update([
            "password" => Hash::make($request->new_password)
        ]);
        if ($flag) {
            Toastr::success('Thay đổi mật khẩu thành công!', 'Thành công');
            return redirect()->route('author.index');
        } else {
            Toastr::error('Xảy ra lỗi. Hãy thử lại sau!', 'Thất bại');
            return back();
        }
        return redirect()->route('author.index');
    }

    public function changeInformation()
    {
        $title = "Quản lí hồ sơ";
        $darkMode = $this->darkMode;
        return view("author.managementAccount.information", compact("title", "darkMode"));
    }

    public function changedInformation(Request $request)
    {
        $request->validate([
            'phone_number' => "required|numeric",
            'full_name' => "required|min:10",
            'address' => "required"
        ], [
            'phone_number.required' => "Hãy nhập số điện thoại.",
            'phone_number.numeric' => "Định dạng nhập không đúng.",
            'full_name.required' => "Hãy nhập họ và tên.",
            'full_name.min' => "Nhập tối thiếu là 10 kí tự.",
            'address.required' => "Hãy nhập địa chỉ đầy đủ.",
        ]);
        $data = [
            'phone_number' => $request->phone_number,
            'full_name' => $request->full_name,
            'address' => $request->address
        ];
        $flag = User::whereId(Auth::id())->update([
            'phone' => $request->phone_number,
            'fullname' => $request->full_name,
            'address' => $request->address
        ]);
        if ($flag) {
            Toastr::success('Thay đổi thông tin thành công!', 'Thành công');
            return redirect()->route('author.index');
        } else {
            Toastr::error('Lỗi thông tin. Hãy thử lại sau!', 'Thất bại');
            return back();
        }
        return redirect()->route('author.index');
    }

    public function changeAvatar()
    {
        $title = "Thay đổi Avatar";
        $darkMode = $this->darkMode;
        return view("author.managementAccount.avatar", compact("title", "darkMode"));
    }

    public function updateAvatar(Request $request)
    {
        $request->validate([
            "avatar" => "required"
        ], [
            "avatar.required" => "Hãy chọn ảnh cần thay đổi."
        ]);
        $image = $request->file('avatar');
        $avatarOld = Auth::user()->avatar;
        File::delete($avatarOld);
        $storedPath = $image->move('images', $image->getClientOriginalName());
        $flag = User::whereId(Auth::id())->update([
            "avatar" => $image->getClientOriginalName()
        ]);
        if ($flag) {
            Toastr::success('Thay đổi avatar thành công!', 'Thành công');
            return redirect()->route('author.index');
        } else {
            Toastr::error('Lỗi tải ảnh. Hãy thử lại sau!', 'Thất bại');
            return back();
        }
        return redirect()->route('author.index');
    }
}