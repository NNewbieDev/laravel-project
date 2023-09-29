<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
          /**
           * Handle an incoming request.
           *
           * @param  \Illuminate\Http\Request  $request
           * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
           * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
           */
          public function handle(Request $request, Closure $next, $role)
          {
                    $user = auth()->user();

                    if ($user && $user->role_id == $role) {
                              return response('Unauthorized', 401);
                    }
                    return $next($request);
          }
}
