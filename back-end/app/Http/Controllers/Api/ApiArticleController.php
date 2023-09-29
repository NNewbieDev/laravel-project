<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
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
                              foreach ($rslt as $list) {
                                        $article = new Article;
                                        if (Article::where("title", "LIKE", $list['title'])->exists()) {
                                                  continue;
                                        } else {
                                                  $article->title = $list['title'];
                                                  $article->description = $list['description'];

                                                  $dom = new \DOMDocument('1.0', 'UTF-8');
                                                  $contents = file_get_contents($list['link']);
                                                  $content = mb_convert_encoding($contents, 'HTML-ENTITIES', "UTF-8");
                                                  @$dom->loadHTML($content);

                                                  $node = $dom->getElementsByTagName("article")->item(0);
                                                  $news = $dom->saveHTML($node);

                                                  $article->content = $news;
                                                  $article->link = $list['link'];
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
                    $article = Article::with('user', 'category')->where('id', $id)->first();
                    return response($article, Response::HTTP_OK);
          }

          public function search(Request $request)
          {
                    $result = Article::with("user")->where('title', 'LIKE', "%{$request->title}%")->where("status", "ACCEPT")->paginate(10);
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
                    $article->delete();
                    return Response::HTTP_NO_CONTENT;
          }
          public function accept($id)
          {
                    $article = Article::where('id', $id)->first();
                    $article->status = "ACCEPT";
                    $article->save();
                    return Response::HTTP_NO_CONTENT;
          }
}
