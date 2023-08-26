<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()->role == 'Admin') {
            return $next($request);
        }

        return response()->json([
            'message' => 'forbidden'
        ], 400);
    }
}
