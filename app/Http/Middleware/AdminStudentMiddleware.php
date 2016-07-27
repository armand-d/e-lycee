<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class AdminStudentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->user()->isStudentAdmin()) {
            return redirect('logout');
        }

        return $next($request);
    }
}
