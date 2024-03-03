<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Rating;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Vedmant\FeedReader\Facades\FeedReader;

class ApiArticleController extends Controller
{
          /**
           * Display a listing of the resource.
           *
           * @return \Illuminate\Http\Response
           */

          public function index()
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
                              for ($list = 0; $list < 10; $list++) {

                                        $article = new Article;
                                        if (Article::where("title", "LIKE", $rslt[$list]['title'])->exists()) {
                                                  continue;
                                        } else {
                                                  $article->title = $rslt[$list]['title'];
                                                  $article->description = $rslt[$list]['description'];

                                                  $dom = new \DOMDocument('1.0', 'UTF-8');
                                                  $contents = file_get_contents($rslt[$list]['link']);
                                                  $content = mb_convert_encoding($contents, 'HTML-ENTITIES', "UTF-8");
                                                  @$dom->loadHTML($content);

                                                  $node = $dom->getElementsByTagName("article")->item(0);
                                                  $news = $dom->saveHTML($node);

                                                  $article->content = $news;
                                                  $article->link = $rslt[$list]['link'];
                                                  $article->categoryID = $rss->id;
                                                  $article->status = "ACCEPT";
                                        }
                                        $article->save();
                              }
                    }
                    $result =  Article::with('user')->where('status', 'ACCEPT')->orderBy('created_at', 'desc')->paginate(10);
                    return response($result, Response::HTTP_OK);
          }

          /**
           * Store a newly created resource in storage.
           *
           * @param  \Illuminate\Http\Request  $request
           * @return \Illuminate\Http\Response
           */
          public function store(Request $request)
          {
                    $article = new Article;
                    $article->title = $request->title;
                    $article->description = $request->description;
                    $article->user_id = auth()->user()->id;
                    $article->categoryID = $request->category;
                    $article->content = $request->content;
                    // dd(auth()->user()->id);

                    //check if file exist 
                    if ($request->hasFile('image')) {
                              $response = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();
                              $article->image = $response;
                              $article->save();
                              return response("Cập nhật thành công", Response::HTTP_OK);
                    } else {
                              return response("Cập nhật thất bại", Response::HTTP_CREATED);
                    }
          }

          /**
           * Display the specified resource.
           *
           * @param  int  $id
           * @return \Illuminate\Http\Response
           */
          public function show($id)
          {
                    $article = Article::with('user', 'category')->find($id);

                    if (!$article) {
                              return response('Không tìm thấy bài viết', Response::HTTP_NOT_FOUND);
                    }

                    $viewCount = $article->view;
                    $article->view = $viewCount + 1;
                    $article->save();
                    return response($article, Response::HTTP_OK);
          }

          public function getAll()
          {
                    $articles = Article::with("user", "category")->withCount('comments', 'reports')->paginate(10);
                    return response($articles, Response::HTTP_OK);
          }

          public function getAllByComment()
          {
                    $articles = Article::with("user", "category")->withCount('comments', 'reports')
                              ->orderBy("comments_count", "desc")->paginate(10);

                    return response($articles, Response::HTTP_OK);
          }

          public function getAllByReport()
          {
                    $articles = Article::with("user", "category")->withCount('comments', 'reports')
                              ->orderBy("reports_count", "desc")->paginate(10);
                    return response($articles, Response::HTTP_OK);
          }

          public function getAllByView()
          {
                    $articles = Article::with("user", "category")->withCount('comments', 'reports')
                              ->orderBy("view", "desc")->paginate(10);
                    return response($articles, Response::HTTP_OK);
          }

          public function search(Request $request)
          {
                    // $result = Article::with("user");
                    // if ($request->exists('cateId')) {
                    //           $result = $result->where('categoryID', $request->cateId);
                    // }

                    // if ($request->exists('title')) {
                    //           $result = $result->where('title', 'LIKE', "%{$request->title}%");
                    // }

                    $result = Article::where('title', 'LIKE', "%{$request->title}%")->where("status", "ACCEPT")->orderBy('created_at', 'desc')->paginate(10);
                    // dd($result->get("categoryID"));
                    return response($result, Response::HTTP_OK);
          }


          /**
           * Update the specified resource in storage.
           *
           * @param  \Illuminate\Http\Request  $request
           * @param  int  $id
           * @return \Illuminate\Http\Response
           */
          public function update(Request $request, $id)
          {
                    $article = Article::find($id);
                    if (auth()->user()->id == $article->user_id) {
                              // dd($request->title);
                              $article->title = $request->title;
                              $article->description = $request->description;
                              $article->categoryID = $request->category;
                              $article->content = $request->content;
                              // dd(auth()->user()->id);
                              //check if file exist 
                              if ($request->hasFile('image')) {
                                        $response = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();
                                        $article->image = $response;
                                        $article->save();
                              }

                              if ($article->save()) {
                                        return response("Cập nhật thành công", Response::HTTP_OK);
                              } else {
                                        return response("Cập nhật thất bại", Response::HTTP_BAD_REQUEST);
                              }
                    } else {
                              return response("Không thể thực hiện chức năng này", Response::HTTP_FORBIDDEN);
                    }
          }

          public function getArticleWaiting()
          {
                    $article = Article::with('user')->where('status', 'WAIT')->orderBy('created_at', 'desc')->paginate(10);
                    return response($article, Response::HTTP_OK);
          }

          /**
           * Remove the specified resource from storage.
           *
           * @param  int  $id
           * @return \Illuminate\Http\Response
           */
          public function destroy($id)
          {
                    $article = Article::where('id', $id)->first();
                    $comment = Comment::where("userID", $id);
                    $rating = Rating::where("articleID", $id);
                    $report = Report::where("articleID", $id);
                    $comment->delete();
                    $rating->delete();
                    $report->delete();
                    $article->delete();
                    return Response::HTTP_NO_CONTENT;
          }

          public function user()
          {
                    $article = Article::where('user_id', auth()->user()->id)->orderBy("created_at", "desc")->paginate(10);
                    return response($article, Response::HTTP_OK);
          }

          public function statistic()
          {
                    $articles = Article::join('categories', 'articles.categoryID', '=', 'categories.id')
                              ->selectRaw('categories.name AS category_name, COUNT(*) AS category_count')
                              ->groupBy('categories.name')
                              ->get();
                    return response($articles, Response::HTTP_OK);
          }

          public function accept($id)
          {
                    $article = Article::where('id', $id)->first();
                    $article->status = "ACCEPT";
                    $article->save();
                    return Response::HTTP_NO_CONTENT;
          }
}
