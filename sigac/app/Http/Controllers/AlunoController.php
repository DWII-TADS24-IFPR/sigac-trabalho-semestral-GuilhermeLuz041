<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\User;
use App\Models\Curso;
use App\Models\Turma;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index()
    {
        $alunos = Aluno::with(['user', 'turma'])->get(); 
        return view('admin.alunos.index', compact('alunos'));
    }

    public function create()
    {
        $users = User::all();
        $turmas = Turma::all();

        return view('admin.alunos.create', compact('users', 'cursos', 'turmas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'senha' => 'required|string|min:6|confirmed',
            'turma_id' => 'required|exists:turmas,id',
        ]);

        $user = User::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'password' => Hash::make($request->senha),
            'role_id' => 2,
        ]);

        Aluno::create([
            'user_id' => $user->id,
            'turma_id' => $request->turma_id,
        ]);

        return redirect()->route('admin.alunos.index')->with('success', 'Aluno cadastrado com sucesso.');
    }

    public function edit(string $id)
    {
        $aluno = Aluno::findOrFail($id);
        $users = User::all();
        $cursos = Curso::all();
        $turmas = Turma::all();

        return view('admin.alunos.edit', compact('aluno', 'users', 'cursos', 'turmas'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'turma_id' => 'required|exists:turmas,id',
        ]);

        $aluno = Aluno::findOrFail($id);
        $aluno->update($request->only('user_id','turma_id'));

        return redirect()->route('admin.alunos.index')->with('success', 'Aluno atualizado com sucesso.');
    }

    public function destroy(string $id)
    {
        $aluno = Aluno::findOrFail($id);
        $aluno->delete();

        return redirect()->route('admin.alunos.index')->with('success', 'Aluno removido com sucesso.');
    }
}
