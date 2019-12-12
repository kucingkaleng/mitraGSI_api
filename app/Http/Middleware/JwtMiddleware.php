<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware
{
  public function handle($request, Closure $next)
  {
    try {
      $user = JWTAuth::parseToken()->authenticate();
    }
    catch (Exception $e) {
      if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
        return response(json_encode([
          'message' => 'Token is invalid'
        ]), 401);
      }
      else {
        return response([
          'message' => 'Authorization token not found'
        ], 401);
      }
    }
    return $next($request);
  }
}
