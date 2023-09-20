<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Vedmant\FeedReader\Facades\FeedReader;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HandleData extends Controller
{
          public function getData()
          {
                    $arrRSS = Category::all();
                    foreach ($arrRSS as $rss) {
                              $file = FeedReader::read($rss->link);
                              $result = [
                                        'title' => $file->get_title(),
                                        'description' => $file->get_description(),
                                        'permalink' => $file->get_permalink(),
                                        'link' => $file->get_link(),
                                        'image_url' => $file->get_image_url(),
                              ];
                              foreach ($file->get_items(0, $file->get_item_quantity()) as $item) {
                                        $i['title'] = $item->get_title();
                                        $i['description'] = $item->get_description();
                                        $i['content'] = $item->get_content();
                                        $i['link'] = $item->get_link();
                                        $i['source'] = $item->get_source();

                                        $result['items'][] = $i;
                              }
                              $rslt = $result['items'];
                              // Lấy thẻ và fix lỗi tiếng việt
                              $dom = new \DOMDocument('1.0', 'UTF-8');
                              foreach ($rslt as $list) {
                                        $article = new Article;
                                        if (Article::where("title", "LIKE", $list['title'])->exists()) {
                                                  continue;
                                        } else {
                                                  $article->title = $list['title'];
                                                  $article->description = $list['description'];
                                                  $article->link = $list['link'];
                                                  $article->categoryID = $rss->id;
                                                  $article->status = "ACCEPT";
                                        }
                                        $article->save();
                              }
                    }
                    $result = Article::where("status", 'ACCEPT')->orderBy("created_at", "desc")->paginate(10);
                    $category = Category::all();
                    return view('welcome', compact('result', 'category'));
          }

          public function latest()
          {
                    $result = Article::orderBy("created_at", "desc")->paginate(10);
                    $category = Category::all();
                    return view('welcome', compact('result', 'category'));
          }

          public function oldest()
          {
                    $result = Article::orderBy("created_at", "asc")->paginate(10);
                    $category = Category::all();
                    return view('welcome', compact('result', 'category'));
          }
          public function search(Request $request)
          {
                    $result = Article::where('title', 'LIKE', "%{$request->search}%")->where("status", "ACCEPT")->paginate(10);
                    $category = Category::all();
                    return view('welcome', compact('result', 'category'));
          }
          public function nav($id)
          {
                    $result = Article::where('categoryID', $id)->where('status', 'ACCEPT')->paginate(10);
                    $category = Category::all();
                    return view('welcome', compact('result', 'category'));
          }
          public function news(Request $request, $id)
          {

                    $dom = new \DOMDocument('1.0', 'UTF-8');
                    // Session::flash('id', $id);
                    // Lấy nội html từ link
                    $article = Article::where("id", $id)->first();
                    $contents = (file_get_contents($article->link));
                    // fix lỗi html entity từ loadHTML
                    $content = mb_convert_encoding($contents, 'HTML-ENTITIES', "UTF-8");
                    @$dom->loadHTML($content);
                    $news = $dom->getElementsByTagName("article")->item(0)->nodeValue;
                    $category = Category::all();
                    $comment = Comment::join('articles', "articles.id", "=", "comments.articleID")->select("comments.*")->get();
                    $request->session()->put("key", $article->id);

                    return view('news', compact('news', 'category', 'article', 'comment'));
          }

          public function comment(Request $request)
          {

                    $comment = new Comment;
                    $comment->userID = Auth::user()->id;
                    // $article = Article::where("ArticleID", $id)->first();
                    $comment->articleID = $request->session()->get("key");
                    $comment->content = $request['comment'];
                    $comment->save();
                    return redirect()->back();
          }
}
