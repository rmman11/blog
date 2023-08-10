<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\AdminUser;

class AdminMiddleware
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

      $credentials = $request->only('email','password');
      
      if (! Auth::guard('admin')->attempt($credentials)) {

      return $next($request);

      }
      else{

        return redirect('/home')->status('status' ,'Are you loin in panel');
      }

    }
}
