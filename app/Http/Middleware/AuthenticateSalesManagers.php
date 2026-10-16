<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AuthenticateSalesManagers
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
         if (! Auth::guard('web_SalesManagers')->check()) {
           return redirect('/SalesManagers_login');
       }
        return $next($request);
    }
}
