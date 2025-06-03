<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Eixo;
use App\Models\Nivel;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index() {
        $cursos = Curso::all();
        return view('admin.cursos.index', compact('cursos'));
    }

    public function create() {
        return view('admin.cursos.create', [
            'eixos' => Eixo::all(),
            'niveis' => Nivel::all()
        ]);
    }

    public function store(Request $request) {
        Curso::create($request->validate([
            'nome' => 'required',
            'sigla' => 'required',
            'total_horas' => 'required',
            'nivel_id' => 'required',
            'eixo_id' => 'required'
        ]));
        return redirect()->route('admin.cursos.index')->with('success', 'Curso criado com sucesso!');
    }

    public function edit($id) {
        return view('admin.cursos.edit', [
            'curso' => Curso::findOrFail($id),
            'eixos' => Eixo::all(),
            'niveis' => Nivel::all()
        ]);
        return view('admin.cursos.edit', compact('curso'));
    }

    public function update(Request $request, $id) {
        Curso::findOrFail($id)->update($request->validate([
            'nome' => 'required',
            'sigla' => 'required',
            'total_horas' => 'required',
            'nivel_id' => 'required',
            'eixo_id' => 'required'
        ]));
        return redirect()->route('admin.cursos.index')->with('success', 'Curso atualizado com sucesso.');
    }

    public function destroy($id) {
        $curso = Curso::findOrFail($id);
        $curso->delete();

        return redirect()->route('admin.cursos.index')->with('success', 'Curso removido com sucesso.');
    }
}
