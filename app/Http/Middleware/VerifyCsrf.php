<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Symfony\Component\HttpFoundation\Response;

class VerifyCsrf extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->expectsJson()) {
            // Perform CSRF token check for non-JSON requests
            return parent::handle($request, $next);
        }

        // For JSON requests, you may choose to handle CSRF protection differently
        // For example, you can check for a CSRF token in the request header

        // Check if the CSRF token is present in the request headers
        $token = $request->header('X-CSRF-TOKEN');

        // Compare the CSRF token from the header with the one generated for the session
        if ($token !== csrf_token()) {
            // CSRF token mismatch, abort the request with an error response
            return response()->json([
                'status' => false,
                'error' => 'CSRF token mismatch'
            ], 403);
        }

        return $next($request);
    }
}
