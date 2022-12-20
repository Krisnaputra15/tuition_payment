<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class verifyAdmin
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
        if(Session()->get('level') != "admin"){
            Session::flash('alert_warning',"you do not have the right permission to access the page");
            return redirect('/');
        }
        return $next($request);
    }
}
