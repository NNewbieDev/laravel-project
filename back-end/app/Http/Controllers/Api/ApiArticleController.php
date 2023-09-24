<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class ApiArticleController extends Controller
{
          /**
           * Display a listing of the resource.
           *
           * @return \Illuminate\Http\Response
           */
          public function index()
          {
                    $articles =  Article::where('status', 'ACCEPT')->orderBy('created_at', 'desc')->paginate(10);
                    return response($articles, Response::HTTP_OK);
          }

          /**
           * Store a newly created resource in storage.
           *
           * @param  \Illuminate\Http\Request  $request
           * @return \Illuminate\Http\Response
           */
          public function store(Request $request)
          {
          }

          /**
           * Display the specified resource.
           *
           * @param  int  $id
           * @return \Illuminate\Http\Response
           */
          public function show($id)
          {
                    $article = Article::where('id', $id)->first();
                    $dom = new \DOMDocument('1.0', 'UTF-8');
                    $article = Article::where("id", $id)->first();
                    $contents = file_get_contents($article->link);
                    $content = mb_convert_encoding($contents, 'HTML-ENTITIES', "UTF-8");
                    @$dom->loadHTML($content);

                    // // Get all img elements
                    // $imgElements = $dom->getElementsByTagName("img");

                    // // Initialize an array to store the image URLs
                    // $imageUrls = [];

                    // foreach ($imgElements as $imgElement) {
                    //           // Get the value of the 'src' attribute for each img element
                    //           $imageUrl = $imgElement->getAttribute('src');

                    //           // Add the URL to the array
                    //           $imageUrls[] = $imageUrl;
                    // }

                    // Now $imageUrls contains all the image URLs in the HTML

                    // $title = $dom->getElementsByTagName("h1")->item(0)->nodeValue;
                    $node = $dom->getElementsByTagName("article")->item(0);
                    $news = $dom->saveHTML($node);
                    // $array = array('title' => $title, 'content' => $content, 'imageUrls' => $imageUrls);
                    // $news = Arr::add($array, null, null);
                    $comment = Comment::where("articleID", $id);

                    return response($news, Response::HTTP_OK);
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
                    //
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
