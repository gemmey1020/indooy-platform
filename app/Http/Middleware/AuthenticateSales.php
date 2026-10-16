<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AuthenticateSales
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
        if (! Auth::guard('web_Sales')->check()) {
           return redirect('/Sales_login');
       }

       return $next($request);
   }

}
