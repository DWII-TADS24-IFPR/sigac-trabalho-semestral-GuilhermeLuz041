<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $role)
    {
        $user = $request->user();

    
        if (!$user || !$user->role || $user->role->nome !== $role) {
            return redirect()->route('login')->withErrors(['access_denied' => 'Você não tem permissão para acessar essa área.']);
        }

        return $next($request);
    }


}
