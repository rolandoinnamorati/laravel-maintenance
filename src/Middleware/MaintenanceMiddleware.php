<?php

namespace Rolandoinnamorati\Maintenance\Middleware;

use Closure;

class MaintenanceMiddleware
{
    public function __construct()
    {
        
    }

    public function handle($request, Closure $next, $slug = null)
    {
        

        return $next($request);
    }
}