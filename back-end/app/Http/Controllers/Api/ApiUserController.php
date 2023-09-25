<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Cloudinary\Cloudinary;
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
                    // dd(auth()->user());
                    // return auth()->user();
                    $user = User::find(auth()->user()->id);
                    // dd(auth()->user());
                    $user->email = $request->email;
                    $user->phone = $request->phone;
                    //check if file exist 
                    if ($request->hasFile('avatar')) {
                              $response = cloudinary()->upload($request->file('avatar')->getRealPath())->getSecurePath();

                              $user->avatar = $response;
                              $user->save();
                              return response("Cập nhật thành công", Response::HTTP_OK);
                    } else {
                              return response("Cập nhật thất bại", Response::HTTP_CREATED);
                    }
          }

          /**
           * Get the authenticated User.
           *
           * @return \Illuminate\Http\JsonResponse
           */
          public function me()
          {
                    dd(auth()->user()->id);
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
