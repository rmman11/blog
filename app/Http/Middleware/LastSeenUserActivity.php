<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Cache;
use Carbon\Carbon;

class LastSeenUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $expires_after = Carbon::now()->addSeconds(5); 
            Cache::put('user-online' . Auth::user()->id, true, $expires_after);

                        //Last Seen
           User::where('id', Auth::user()->id)->update(['last_seen' => Carbon::now()]);
        }

        return $next($request);

    
    }
}
