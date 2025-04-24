<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PreventBackMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        $response->headers->set('cache-control','no-store, no-cache,must-revalidate,max-age-0');
        $response->headers->set('pragna',"no-cache");
        $response->headers->set('Expires','set, 01 Jan 2000 00:00:00 GMT');

        return $response;
    }
}
