<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use App\Models\Curso;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    public function index() {
        $turmas = Turma::all();
        return view('admin.turmas.index', compact('turmas'));
    }

    public function create() {
        return view('admin.turmas.create', [
            'cursos' => Curso::all()
        ]);
    }

    public function store(Request $request) {
        Turma::create($request->validate([
            'ano' => 'required|integer',
            'curso_id' => 'required'
        ]));
        return redirect()->route('admin.turmas.index')->with('success', 'Turma criada com sucesso.');
    }

    public function edit($id) {
        return view('admin.turmas.edit', [
            'turma' => Turma::findOrFail($id),
            'cursos' => Curso::all()
        ]);
    }

    public function update(Request $request, $id) {
        Turma::findOrFail($id)->update($request->validate([
            'ano' => 'required|integer',
            'curso_id' => 'required'
        ]));
        return redirect()->route('admin.turmas.index')->with('success', 'Turma atualizada com sucesso.');
    }

    public function destroy($id) {
        Turma::findOrFail($id)->delete();
        return redirect()->route('admin.turmas.index')->with('success', 'Turma removida com sucesso.');
    }
}
