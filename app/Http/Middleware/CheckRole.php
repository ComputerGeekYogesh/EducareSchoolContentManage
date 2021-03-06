<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RoleUser;
class CheckRole
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

        if (Auth::user()->role_id == 1 && Auth::user()->deactivate == 0 )      //* Admin check
       {
        return $next ($request);
       }

       if (Auth::user()->role_id == 2  && Auth::user()->deactivate == 0)     //* Student check
       {
           return $next ($request);
       }

       if (Auth::user()->role_id == 3  && Auth::user()->deactivate == 0)    //* Teacher check
       {
        return $next ($request);

       }

       else
       {
        return redirect('noaccess')->with('status','You are not allowed to access the dashboard');
       }


}
}
