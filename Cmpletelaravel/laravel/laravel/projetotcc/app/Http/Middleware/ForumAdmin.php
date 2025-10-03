<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('forum')->check() || Auth::guard('forum')->user()->email !== 'admin@forum.com') {
            return redirect('/forum')->with('error', 'Acesso não autorizado.');
        }

        return $next($request);
    }
}