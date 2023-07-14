<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || !auth()->user()->isAdmin()) {
            return redirect('/'); // Przekieruj na inną stronę w przypadku braku uwierzytelnienia lub braku uprawnień administratora
        }

        return $next($request);
    }
}
