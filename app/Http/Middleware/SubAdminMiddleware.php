<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Response as FacadeResponse;
class SubAdminMiddleware
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
        
        
        if ($request->user() && $request->user()->role != 1)
        {
          return redirect('unauthorized');
        }
        return $next($request);
}
        
}
