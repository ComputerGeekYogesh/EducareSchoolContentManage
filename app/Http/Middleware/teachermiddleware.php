<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class teachermiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->role_id == 3  && Auth::user()->deactivate == 0)    //* Teacher check
        {
         return $next ($request);

        }
        return redirect('noaccess')->with('status','You are not allowed to access the teacher dashboard');
    }
}
