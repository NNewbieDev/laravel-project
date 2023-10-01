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
          public function handle(Request $request, Closure $next, $role, $other)
          {
                    $user = auth()->user();
                    // dd($role);
                    if ($user && ($user->role_id == $role || $user->role_id == $other)) {
                              return $next($request);
                    }
                    return response('Unauthorized', 401);
          }
}
