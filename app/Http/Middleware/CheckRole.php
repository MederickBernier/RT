<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
{
    // Trim spaces from role names
    $roles = array_map('trim', $roles);

    // Allow 'Admin' role unrestricted access
    if (Auth::check() && Auth::user()->roles->pluck('name')->contains('Admin')) {
        return $next($request);
    }

    // Check for multiple roles
    if (Auth::check() && Auth::user()->roles->whereIn('name', $roles)->count()) {
        \Log::info('User Roles: ', Auth::user()->roles->pluck('name')->toArray());
        \Log::info('Required Roles for Route: ', $roles);
        return $next($request);
    }

    abort(403, 'Access Denied');
}
}
