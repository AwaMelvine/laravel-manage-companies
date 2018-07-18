<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class AdminOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      $user = $request->user();
      if ($user && $user->role_id) {
          return $next($request);
      }else{
          Session::flash('alert-class', 'alert-danger');
          Session::flash('message', 'You are not authorized to access this page');
          return redirect('/');
      }
    }
}
