<?php

namespace App\Http\Middleware;

use Closure;

class ClienteMiddleware
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
        if (auth()->user()->tipo==2 && auth()->user()->activo==1) {
            return $next($request);
            // return view('errors.403_error');
        }
        return redirect('/admin/sin-permiso');
    }
}
