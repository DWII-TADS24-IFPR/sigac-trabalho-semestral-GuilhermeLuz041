<?php

namespace App\Http\Controllers;

use App\Models\Comprovante;
use App\Models\Categoria;
use App\Models\Aluno;
use App\Models\User;
use Illuminate\Http\Request;

class ComprovanteController extends Controller
{
    public function index() {
        $comprovantes = Comprovante::all();
        return view('admin.comprovantes.index', compact('comprovantes'));
    }

    public function create() {
        return view('admin.comprovantes.create', [
            'categorias' => Categoria::all(),
            'alunos' => Aluno::all(),
            'users' => User::all()
        ]);
    }

    public function store(Request $request) {
        Comprovante::create($request->validate([
            'horas' => 'required',
            'atividade' => 'required',
            'categoria_id' => 'required',
            'aluno_id' => 'required',
            'user_id' => 'required'
        ]));
        return redirect()->route('comprovantes.index');
    }

    public function edit($id) {
        return view('admin.comprovantes.edit', [
            'comprovante' => Comprovante::findOrFail($id),
            'categorias' => Categoria::all(),
            'alunos' => Aluno::all(),
            'users' => User::all()
        ]);
    }

    public function update(Request $request, $id) {
        Comprovante::findOrFail($id)->update($request->validate([
            'horas' => 'required',
            'atividade' => 'required',
            'categoria_id' => 'required',
            'aluno_id' => 'required',
            'user_id' => 'required'
        ]));
        return redirect()->route('comprovantes.index');
    }

    public function destroy($id) {
        Comprovante::findOrFail($id)->delete();
        return redirect()->route('comprovantes.index');
    }
}
