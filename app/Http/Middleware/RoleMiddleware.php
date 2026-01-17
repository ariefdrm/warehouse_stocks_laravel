<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = $request->user();

        if (! $user) {
            abort(401);
        }

        if (! in_array($user->role->role_name, $roles)) {
            abort(403, 'Forbidden');
        }

        return $next($request);
    }
}
