<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

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
                    $credentials = request(['username', 'password']);

                    if (!$token = auth()->attempt($credentials)) {
                              return response()->json(['error' => 'Unauthorized'], 401);
                    }

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

          /**
           * Get the authenticated User.
           *
           * @return \Illuminate\Http\JsonResponse
           */
          public function me()
          {
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
                              'expires_in' => auth('api')->factory()->getTTL() * 60
                    ]);
          }
}
