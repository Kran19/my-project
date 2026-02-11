<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackUniqueVisitors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ip = $request->ip();
        $today = now()->format('Y-m-d');

        \App\Models\Visitor::firstOrCreate([
            'ip_address' => $ip,
            'visit_date' => $today,
        ]);

        return $next($request);
    }
}
