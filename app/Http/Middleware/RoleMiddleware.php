<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if (! $user) {
            abort(401);
        }

        if (! in_array($user->role->role_name, $roles)) {
            abort(403, 'Forbidden');
        }

        return $next($request);
    }
}
