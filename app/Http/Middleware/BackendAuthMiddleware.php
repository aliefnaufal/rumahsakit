<?php

namespace App\Http\Middleware;

use Closure;

class BackendAuthMiddleware
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
        if(!\Session::get('user_data')){
            return redirect('/backend/login');
        }
        
        return $next($request);
    }
}
