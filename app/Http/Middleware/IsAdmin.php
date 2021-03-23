<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{

    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->permission !== 'admin'){
            return redirect('/')->withErrors(["Tu n'es pas admin OUSTE !!"]); // If user is not an admin.
        }else{
            return $next($request);
        }

    }
}
