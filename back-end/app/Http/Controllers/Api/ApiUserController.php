<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Rating;
use App\Models\Report;
use App\Models\User;
use Cloudinary\Cloudinary;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;

class ApiUserController extends Controller
{
          /**
           * Create a new AuthController instance.
           *
           * @return void
           */
          public function __construct()
          {
                    $this->middleware('auth:api', ['except' => ['login', 'register']]);
          }

          /**
           * Get a JWT via given credentials.
           *
           * @return \Illuminate\Http\JsonResponse
           */
          public function login()
          {
                    // return request(['username', 'password']);
                    $credentials =  request(['username', 'password']);

                    if (!$token = auth()->attempt($credentials)) {
                              return response()->json(['error' => 'Unauthorized'], 401);
                    }
                    // dd($token);
                    return $this->respondWithToken($token);
          }

          public function register(Request $request)
          {

                    $user = new User;
                    $user->username = $request->username;
                    $user->password = Hash::make($request->password);
                    $user->email = $request->email;
                    $user->phone = $request->phone;
                    $user->save();

                    // User::create([
                    //           'username' => $request['username'],
                    //           'password' => Hash::make($request['password']),
                    //           'email' => $request['email'],
                    //           'phone' => $request['phone'],
                    //           // 'avatar' => $filename
                    // ]);
                    return response("Đăng ký thành công", Response::HTTP_CREATED);
          }

          public function update(Request $request)
          {
                    try {

                              // dd(auth()->user());
                              // return auth()->user();
                              $user = User::find(auth()->user()->id);
                              // dd(auth()->user());
                              $user->email = $request->email;
                              $user->phone = $request->phone;
                              // dd($request->file('avatar'));
                              //check if file exist 
                              if ($request->hasFile('avatar')) {
                                        $response = cloudinary()->upload($request->file('avatar')->getRealPath())->getSecurePath();
                                        $user->avatar = $response;
                                        $user->save();
                                        return response("Cập nhật thành công", Response::HTTP_OK);
                              } else {
                                        $user->avatar = auth()->user()->avatar;
                                        $user->save();
                                        return response("Cập nhật thành công", Response::HTTP_OK);
                              }
                              // $user->save();
                              // return response("Cập nhật thành công", Response::HTTP_OK);
                    } catch (Exception) {
                              return response("Cập nhật thất bại", Response::HTTP_BAD_REQUEST);
                    }
          }

          public function changePassword(Request $request)
          {
                    $user = User::find(auth()->user()->id);
                    $user->password = Hash::make($request->newPass);
                    $user->save();
                    return response("Cập nhật thành công", Response::HTTP_OK);
          }

          public function send()
          {
                    $user = User::find(auth()->user()->id);
                    $user->level_up = "SENT";
                    $user->save();
                    return response("Đã gửi yêu cầu", Response::HTTP_CREATED);
          }

          public function getUserSent()
          {
                    $user = User::where("level_up", "SENT")->orderBy("created_at", "DESC")->paginate(10);
                    return response($user, Response::HTTP_OK);
          }
          /**
           * Get the authenticated User.
           *
           * @return \Illuminate\Http\JsonResponse
           */
          public function me()
          {
                    // dd(auth()->user()->id);
                    return response()->json(auth()->user());
          }

          /**
           * Log the user out (Invalidate the token).
           *
           * @return \Illuminate\Http\JsonResponse
           */
          public function logout()
          {
                    auth()->logout();

                    return response()->json(['message' => 'Successfully logged out']);
          }

          /**
           * Refresh a token.
           *
           * @return \Illuminate\Http\JsonResponse
           */
          public function refresh()
          {
                    return $this->respondWithToken(auth()->refresh());
          }

          public function getUsers()
          {
                    $user = User::with("role")->where("role_id", "!=", 3)->paginate(10);
                    return response($user, Response::HTTP_OK);
          }

          public function cancel($id)
          {
                    $user = User::find($id);
                    $user->level_up = "WAIT";
                    $user->save();
                    return response("Yêu cầu bị từ chối", Response::HTTP_OK);
          }

          public function levelUp($id)
          {
                    $user = User::find($id);
                    $user->level_up = "OK";
                    $user->role_id = 2;
                    $user->save();
                    return response("Đã nâng cấp vai trò", Response::HTTP_OK);
          }

          public function levelDown($id)
          {
                    $user = User::find($id);
                    $user->level_up = "WAIT";
                    $user->role_id = 1;
                    $user->save();
                    return response("Đã giảm cấp vai trò", Response::HTTP_OK);
          }

          public function destroy($id)
          {
                    $user = User::find($id);
                    $article = Article::where("user_id", $id);
                    $comment = Comment::where("userID", $id);
                    $rating = Rating::where("userID", $id);
                    $report = Report::where("userID", $id);
                    $comment->delete();
                    $rating->delete();
                    $report->delete();
                    $article->delete();
                    $user->delete();
                    return response("Tài khoản đã được xóa", Response::HTTP_ACCEPTED);
          }

          /**
           * Get the token array structure.
           *
           * @param  string $token
           *
           * @return \Illuminate\Http\JsonResponse
           */
          protected function respondWithToken($token)
          {
                    return response()->json([
                              'access_token' => $token,
                              'token_type' => 'bearer',
                              'expires_in' => JWTFactory::getTTL() * 60
                    ]);
          }
}
