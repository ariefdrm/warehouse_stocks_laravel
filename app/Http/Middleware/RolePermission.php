<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolePermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $permission): Response
    {
        $user = $request->user();

        if (! $user) {
            abort(401, 'Unauthenticated');
        }

        $role = $user->role->role_name;

        // Role rules
        $permissions = [
            'owner' => ['read', 'create', 'update', 'delete'],
            'admin' => ['read', 'create', 'update', 'delete'],
            'staff' => ['read'],
        ];

        if (! isset($permissions[$role]) || ! in_array($permission, $permissions[$role])) {
            abort(403, 'You are not allowed to perform this action');
        }

        return $next($request);
    }
}
