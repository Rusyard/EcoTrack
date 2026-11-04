<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    /**
     * Tolak akses (403) kalau user yang login rolenya bukan salah satu
     * dari $roles. Dipasang di routes/web.php lewat alias 'role',
     * misalnya: ->middleware('role:dinas').
     *
     * Route ini harus sudah dibungkus middleware 'auth' juga, supaya
     * user yang belum login diarahkan ke halaman login (bukan 403).
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        if (! $request->user() || ! in_array($request->user()->role, $roles, true)) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}