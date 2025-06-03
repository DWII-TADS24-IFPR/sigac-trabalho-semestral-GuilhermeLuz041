<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $user = $request->user();
        
        if (!$user) {
            return redirect()->route('login');
        }
        
        if (!$user->role || $user->role->nome !== $role) {
            return redirect()->route('login')
                 ->with('error', 'Você não tem permissão para acessar esta área');
        }


        if ($user && $user->role && $user->role->nome === $role) {
            return $next($request);
        }
        
        
        abort(403, 'Acesso não autorizado');
    }
}