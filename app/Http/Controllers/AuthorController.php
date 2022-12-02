<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Authors;
use App\Models\Page;
use App\Models\PostProcess;
use App\Models\Category;
use File;


class AuthorController extends Controller
{
    private $news;
    private $author;
    private $postProcess;
    private $authorID = 4;
    private $darkMode = false;
    public function __construct()
    {
        $this->news = new News();
        $this->author = new Authors();
        $this->postProcess = new PostProcess();
        @session_start();
    }

    public function index()
    {
        $title = "Tài khoản";
        $auth = $this->author->getAuthor($this->authorID);
        $darkMode   = $this->darkMode;
        return view("author.index", compact("title", "auth", "darkMode"));
    }

    public function addNews()
    {
        $title = "Tạo bài viết mới";
        $auth = $this->author->getAuthor($this->authorID);
        // $pages = Page::get();
        $category = Category::all();
        $darkMode = $this->darkMode;
        return view("author.addNews", compact("title", "auth", "category", "darkMode"));
    }

    public function postNews(Request $request)
    {
        // dd($request-);
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
        // $auth = $this->author->getAuthor($this->authorID);
        // $auth = $auth->id;
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
        $auth = $this->author->getAuthor($this->authorID);
        $darkMode = $this->darkMode;
        return view("author.managementAccount.password", compact("title", "auth", "darkMode"));
    }

    public function changedPassword(Request $request)
    {
        $request->validate([
            'old_password' => "required|min:8",
            'new_password' => "required|min:8|same:confirmation_password",
            'confirmation_password' => "required|min:8"
        ], [
            "old_password.required" => "Hãy nhập mật khẩu cũ.",
            "old_password.min" => "Tối thiểu 8 kí tự",
            "new_password.required" => "Hãy nhập mật khẩu mới.",
            "new_password.min" => "Tối thiểu 8 kí tự.",
            "new_password.same" => "Mật khẩu không trùng khớp với mật khẩu xác nhận.",
            "confirmation_password.required" => "Hãy nhập lại mật khẩu mới.",
            "confirmation_password.min" => "Tối thiểu 8 kí tự"
        ]);
        if ($this->author->checkPassword($this->authorID, md5($request->old_password))) {
            $this->author->updatePassword($this->authorID, md5($request->new_password));
        } else {
            dd("Password is not correct. Please try again");
        }
        return redirect()->route('author.index');
    }

    public function changeInformation()
    {
        $title = "Quản lí hồ sơ";
        $auth = $this->author->getAuthor($this->authorID);
        $darkMode = $this->darkMode;
        return view("author.managementAccount.information", compact("title", "auth", "darkMode"));
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
        $this->author->updateInformation($this->authorID, $data);
        return redirect()->route('author.index');
    }

    public function changeAvatar()
    {
        $title = "Thay đổi Avatar";
        $avatar = $this->author->getAuthor($this->authorID)->avatar;
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
