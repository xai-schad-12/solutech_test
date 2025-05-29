<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Organization;

class IdentifyTenantFromPath
{
    public function handle(Request $request, Closure $next)
    {
        $segments = $request->segments();

        if (isset($segments[0])) {
            $slug = $segments[0];
            $tenant = Organization::where('slug', $slug)->first();

            if ($tenant) {
                app()->instance('currentTenant', $tenant);

                // Remove tenant slug so routes can be matched normally
                $request->server->set('REQUEST_URI', '/' . implode('/', array_slice($segments, 1)));
            } else {
                abort(404, 'Organization not found');
            }
        }

        return $next($request);
    }
}
