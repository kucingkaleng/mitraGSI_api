<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use App\Transformers\AuthTransformer;
use App\User;

class AuthController extends Controller
{
  public function __construct()
  {
    $this->middleware('jwt.verify', ['except' => ['login','register']]);
  }

  // Login
  public function login (Request $req) {
    $credentials = $req->only('username', 'password');
    $user = User::where('username',$req->username)->get();

    if (count($user) == 0) {
      return response([
        'status' => 'error',
        'code' => 401,
        'message' => 'username not found'
      ], 401);
    }

    $user = $user->first();
    $user->load('role');
    $user->load('data');

    if (!in_array($user->token,['',null])) {
      return $this->respondWithToken($user->token, $user);
    }
    else {
      if ($token = JWTAuth::attempt($credentials)) {
        $this->updateUserToken($user->id, $token);
        return $this->respondWithToken($token, $user);
      }
    }

    return response()->json(['error' => 'Unauthorized'], 401);
  }

  // Register
  public function register (Request $req) {
    User::create($req->all());

    return response()->json(['status' => 'ok']);
  }

  // Me
  public function me()
  {
    $user = fractal()->item(JWTAuth::parseToken()->authenticate(), new AuthTransformer)->toArray();
    return response()->json($user);
  }

  // Logout
  public function logout()
  {
    $this->updateUserToken($this->guard()->user()->id, null);
    $this->guard()->logout();
    return response()->json(['message' => 'Successfully logged out']);
  }

  // Refresh
  public function refresh () {
    return $this->respondWithToken($this->guard()->refresh());
  }

  protected function respondWithToken ($token, $user) {
    $user = fractal()->item($user, new AuthTransformer)->toArray();
    return response()->json([
      'access_token' => $token,
      'token_type' => 'bearer',
      'user' => $user
    ]);
  }

  protected function updateUserToken ($id, $token) {
    $user = User::find($id);
    $user->token = $token;
    $user->update();
    return '';
  }

  public function guard()
  {
    return Auth::guard();
  }
}
