<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function create()
{
    if (Auth::check()) {
        $user = Auth::user();

        if ($user->role && $user->role->nome === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if ($user->role && $user->role->nome === 'aluno') {
            return redirect()->route('aluno.dashboard');
        }

        return redirect()->route('unauthorized');
    }

    return view('auth.login');
}

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role && $user->role->nome === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            if ($user->role && $user->role->nome === 'aluno') {
                return redirect()->route('aluno.dashboard');
            }

            return redirect('/unauthorized');
        }

        return back()->withErrors([
            'email' => 'As credenciais fornecidas estão incorretas.',
        ]);
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
