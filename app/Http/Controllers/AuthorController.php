<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Authors;
use File;


class AuthorController extends Controller
{
    private $news;
    private $author;
    private $authorID = 2;
    private $darkMode = false;
    public function __construct()
    {
        $this->news = new News();
        $this->author = new Authors();
    }

    public function index()
    {
        $title = "Tài khoản";
        $auth = $this->author->getAuthor($this->authorID);
        $auth = $auth[0];
        $darkMode = $this->darkMode;
        return view("author.index", compact("title", "auth", "darkMode"));
    }

    public function addNews()
    {
        $title = "Tạo bài viết mới";
        $auth = $this->author->getAuthor($this->authorID);
        $auth = $auth[0];
        $darkMode = $this->darkMode;
        return view("author.addNews", compact("title", "auth", "darkMode"));
    }

    public function postNews(Request $request)
    {
        $request->validate([
            'category_news' => "required",
            'title_news' => "required|max:255",
            'content_news' => "required|min:50",
            'image_news' => "required",
        ], [
            "category_news.required" => "Hãy chọn thể loại bài viết",
            "title_news.required" => "Hãy nhập tiều đề bài viết.",
            "title_news.max" => "Số kí tự vượt quá mức tối đa.",
            "content_news.required" => "Hãy nhập nội dung bài viết.",
            "content_news.min" => "Số kí tự cho nội dung quá ít.",
            "image_news.required" => "Hãy chọn ảnh làm bìa nội dung.",
        ]);
        $image = $request->file('image_news');
        $storedPath = $image->move('images', $image->getClientOriginalName());
        $auth = $this->author->getAuthor($this->authorID);
        $auth = $auth[0];
        $auth = $auth->authorName;
        $data = [
            'new_title' => $request->title_news,
            'new_content' => $request->content_news,
            'category' => $request->category_news,
            'post_at' => date("Y:m:d H:i:s"),
            'new_author' => $auth,
            'path_image' => $storedPath
        ];
        $this->news->addNews($data);
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
        $auth = $this->author->getAuthor($this->authorID);
        $auth = $auth[0];
        $darkMode = $this->darkMode;
        return view("author.managementAccount.password", compact("title", "auth", "darkMode"));
    }

    public function changedPassword(Request $request)
    {
        $request->validate([
            'old_password' => "required|min:8",
            'password' => "required|min:8",
            'confirm_password' => "required|min:8"
        ], [
            "old_password.required" => "Hãy nhập mật khẩu cũ.",
            "old_password.min" => "Tối thiểu 8 kí tự",
            "password.required" => "Hãy nhập mật khẩu mới.",
            "password.min" => "Tối thiểu 8 kí tự",
            "confirm_password.required" => "Hãy nhập lại mật khẩu mới.",
            "confirm_password.min" => "Tối thiểu 8 kí tự"
        ]);
        $password = $request->password;
        $this->author->updatePassword($this->authorID, $password);
        return redirect()->route('author.index');
    }

    public function changeInformation()
    {
        $title = "Quản lí hồ sơ";
        $auth = $this->author->getAuthor($this->authorID);
        $auth = $auth[0];
        $darkMode = $this->darkMode;
        return view("author.managementAccount.information", compact("title", "auth", "darkMode"));
    }

    public function changedInformation(Request $request)
    {
        $request->validate([
            'phone_number' => "required|numeric",
            'full_name' => "required|min:10",
            'address' => "required",
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
        $this->author->updateInformation($this->authorID, $data);
        return redirect()->route('author.index');
    }

    public function changeAvatar()
    {
        $title = "Thay đổi Avatar";
        $auth = $this->author->getAuthor($this->authorID);
        $avatar = $auth[0]->avatar;
        $darkMode = $this->darkMode;
        return view("author.managementAccount.avatar", compact("title", "avatar", "darkMode"));
    }

    public function updateAvatar(Request $request)
    {
        $request->validate([
            "avatar" => "required"
        ], [
            "avatar.required" => "Hãy chọn ảnh cần thay đổi."
        ]);
        $image = $request->file('avatar');
        $storedPath = $image->move('images', $image->getClientOriginalName());
        $this->author->updateAvatar($this->authorID, $image->getClientOriginalName());
        return redirect()->route('author.index');
    }
}