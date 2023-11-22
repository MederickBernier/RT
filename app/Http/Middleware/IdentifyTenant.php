<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Models\Tenant;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IdentifyTenant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $subdomain = explode('.', $request->getHost())[0];

        $tenant = Tenant::where('slug', $subdomain)->first();

        if(!$tenant){
            abort(404, 'Tenant not found');
        }

        // Set the tenant in the app container
        app()->singleton('tenant', function() use ($tenant){
            return $tenant;
        });

        return $next($request);
    }
}
