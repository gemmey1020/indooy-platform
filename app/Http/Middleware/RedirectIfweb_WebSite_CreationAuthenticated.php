<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class RedirectIfweb_WebSite_CreationAuthenticated
{

     public function handle($request, Closure $next)
    {
            if (Auth::guard()->check()) {
          return redirect('/WebSite_Creation');
      }
         if (Auth::guard('web_WebSite_Creation')->check()) {
           return redirect('/WebSite_Creation');
       }

        return $next($request);
    }
}
