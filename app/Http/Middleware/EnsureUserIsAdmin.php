<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang bisa mengakses halaman ini.');
        }

        return $next($request);
    }
}
