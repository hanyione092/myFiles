<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class postCheck
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
        if (auth()->user()->email == 'jpbuco@cvsu.edu.ph'){
            return redirect()->route('post')->with('unable', 'you dont have an authority to delete data');
        }
        return $next($request);
    }
}
