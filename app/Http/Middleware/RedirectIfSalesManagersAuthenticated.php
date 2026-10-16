<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class RedirectIfSalesManagersAuthenticated
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

      //If request comes from logged in seller, he will
      //be redirected to seller's home page.
      if (Auth::guard()->check()) {
          return redirect('/SalesManager_Dashboard');
      }
      if (Auth::guard('web_SalesManagers')->check()) {
          return redirect('/SalesManager_Dashboard');
      }
      return $next($request);

    }
}
