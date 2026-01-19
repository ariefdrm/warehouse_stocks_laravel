<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = Auth::user();

        // Belum login atau tidak punya role
        if (!$user || !$user->role) {
            abort(403, 'Unauthorized');
        }

        // Cocokkan dengan role_name di tabel roles
        if (!in_array($user->role->role_name, $roles)) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
