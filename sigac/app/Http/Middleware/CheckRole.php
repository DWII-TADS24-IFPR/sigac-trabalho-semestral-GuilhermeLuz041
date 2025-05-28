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
            Log::warning('Usuário não autenticado tentou acessar rota restrita.');
            return redirect()->route('unauthorized');
        }
    
    
        Log::info("Verificando acesso. Usuário ID {$user->id} | Role: {$user->role} | Role exigida: {$role}");
    
        if ($user->role !== $role) {
            Log::warning("Acesso negado para usuário ID {$user->id}. Role atual: {$user->role} | Role necessária: {$role}");
            return redirect()->route('unauthorized');
        }
    
        return $next($request);
    }
}
