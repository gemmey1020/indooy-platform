<?php

namespace App\Http\Middleware;

use Closure;
use \Illuminate\Http\Request ;
class Lang
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
        $LANG=strtolower($request->lang);
        if (!in_array("$LANG", ['ar','en']))
        {
            $LANG='ar';
        }
         app()->setlocale($LANG);
        return $next($request);
    }
}
