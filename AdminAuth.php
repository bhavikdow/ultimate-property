<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
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
        if(empty(session()->get('regions'))){
            session()->put('regions','1');
        }
        if (!$request->session()->has('admin_id')) {
            return redirect('admin/login'); 
        }
        return $next($request);
    }
}
