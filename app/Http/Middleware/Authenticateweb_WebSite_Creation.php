<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Authenticateweb_WebSite_Creation
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
         if (! Auth::guard('web_WebSite_Creation')->check()) {
           return redirect('WebSite_Creation/login');
       }

        return $next($request);
    }
}

