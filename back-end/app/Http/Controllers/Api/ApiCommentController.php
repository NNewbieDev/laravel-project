<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiCommentController extends Controller
{
          /**
           * Display a listing of the resource.
           *
           * @return \Illuminate\Http\Response
           */
          public function index($id)
          {
                    $comment =  Comment::with("user")->where("articleID", $id)->orderBy("created_at", "desc")->paginate(10);
                    return response($comment, Response::HTTP_OK);
          }

          /**
           * Store a newly created resource in storage.
           *
           * @param  \Illuminate\Http\Request  $request
           * @return \Illuminate\Http\Response
           */
          public function store(Request $request, $id)
          {
                    $comment = new Comment;
                    $comment->userID = auth()->user()->id;
                    // $article = Article::where("ArticleID", $id)->first();
                    // $comment->articleID = $request->session()->get("key");
                    $comment->articleID = $id;
                    $comment->content = $request['comment'];
                    $comment->save();
                    return response("Bạn đã bình luận", Response::HTTP_CREATED);
          }

          /**
           * Display the specified resource.
           *
           * @param  int  $id
           * @return \Illuminate\Http\Response
           */
          public function show($id)
          {
                    $comment = Comment::where("articleID", $id)->paginate(5);
                    return response(CommentResource::collection($comment), Response::HTTP_OK);
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
                    //
          }
}
