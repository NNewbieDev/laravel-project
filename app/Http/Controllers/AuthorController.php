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
        return view("author.index", compact("title", "auth"));
    }

    public function addNews()
    {
        $title = "Tạo bài viết mới";
        $auth = $this->author->getAuthor($this->authorID);
        $auth = $auth[0];
        return view("author.addNews", compact("title", "auth"));
    }

    public function postNews(Request $request)
    {
        if (!$request->hasFile('image_news')) {
            return "Please choose file image";
        }
        $image = $request->file('image_news');
        $storedPath = $image->move('images', $image->getClientOriginalName());
        $title = "Tài khoản";
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
        return redirect()->route('author.index', compact('title'));
    }

    public function listNews()
    {
        $title = "Bài viết của tôi";
        $newsList = $this->news->getAllNews();
        return view("author.listNews", compact("title", "newsList"));
    }

    public function changePassword()
    {
        $title = "Quản lí mật khẩu";
        $auth = $this->author->getAuthor($this->authorID);
        $auth = $auth[0];
        return view("author.managementAccount.password", compact("title", "auth"));
    }

    public function changeInformation()
    {
        $title = "Quản lí hồ sơ";
        $auth = $this->author->getAuthor($this->authorID);
        $auth = $auth[0];
        return view("author.managementAccount.information", compact("title", "auth"));
    }

    public function changeAvatar()
    {
        $title = "Thay đổi Avatar";
        $auth = $this->author->getAuthor($this->authorID);
        $avatar = $auth[0]->avatar;
        return view("author.managementAccount.avatar", compact("title", "avatar"));
    }

    public function updateAvatar(Request $request)
    {
        if (!$request->hasFile('avatar')) {
            return "Please choose file image";
        }
        $image = $request->file('avatar');
        $storedPath = $image->move('images', $image->getClientOriginalName());
        $this->author->updateAvatar($this->authorID, $image->getClientOriginalName());
        $title = "Tài khoản";
        return redirect()->route('author.index', compact('title'));
    }
}