<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
<<<<<<< HEAD

        switch($guard)
        {  case 'admin':
            if(Auth::guard($guard)->check())
            {
                return redirect('/Admin');
                dd('ok');
            }
            break;

            default:
            if (Auth::guard($guard)->check()) {
            return redirect('/home');
            dd('hello');
          
        }
          
        }
//dd(Auth::guard($guard)->check());
=======
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }

>>>>>>> d1cb5ffb453ba83f73b8ec0964c6d505c698d739
        return $next($request);
    }
}
