<?php

namespace App\Http\Controllers;

use App\Models\Declaracao;
use App\Models\Aluno;
use App\Models\Comprovante;
use Illuminate\Http\Request;

class DeclaracaoController extends Controller
{
    public function index() {
        $declaracoes = Declaracao::all();
        return view('admin.declaracoes.index', compact('declaracoes'));
    }

    public function create() {
        return view('admin.declaracoes.create', [
            'alunos' => Aluno::all(),
            'comprovantes' => Comprovante::all()
        ]);
    }

    public function store(Request $request) {
        Declaracao::create($request->validate([
            'hash' => 'required',
            'data' => 'required|date',
            'aluno_id' => 'required',
            'comprovante_id' => 'required'
        ]));
        return redirect()->route('declaracoes.index');
    }

    public function edit($id) {
        return view('admin.declaracoes.edit', [
            'declaracao' => Declaracao::findOrFail($id),
            'alunos' => Aluno::all(),
            'comprovantes' => Comprovante::all()
        ]);
    }

    public function update(Request $request, $id) {
        Declaracao::findOrFail($id)->update($request->validate([
            'hash' => 'required',
            'data' => 'required|date',
            'aluno_id' => 'required',
            'comprovante_id' => 'required'
        ]));
        return redirect()->route('declaracoes.index');
    }

    public function destroy($id) {
        Declaracao::findOrFail($id)->delete();
        return redirect()->route('declaracoes.index');
    }
}
