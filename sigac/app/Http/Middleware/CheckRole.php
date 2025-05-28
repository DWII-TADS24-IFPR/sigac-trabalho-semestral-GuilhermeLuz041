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

        if (!$user->role || $user->role->nome !== $role) {
            Log::warning("Acesso negado para usuário ID {$user->id}. Role atual: " . ($user->role->nome ?? 'nenhuma') . " | Role necessária: {$role}");
            return redirect()->route('unauthorized');
        }

        Log::info("Acesso permitido para usuário ID {$user->id} com role {$user->role->nome}");

        return $next($request);
    }
}
