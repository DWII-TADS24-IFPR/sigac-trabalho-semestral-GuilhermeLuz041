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
        return redirect()->route('cursos.index');
    }

    public function edit($id) {
        return view('admin.cursos.edit', [
            'curso' => Curso::findOrFail($id),
            'eixos' => Eixo::all(),
            'niveis' => Nivel::all()
        ]);
    }

    public function update(Request $request, $id) {
        Curso::findOrFail($id)->update($request->validate([
            'nome' => 'required',
            'sigla' => 'required',
            'total_horas' => 'required',
            'nivel_id' => 'required',
            'eixo_id' => 'required'
        ]));
        return redirect()->route('cursos.index');
    }

    public function destroy($id) {
        Curso::findOrFail($id)->delete();
        return redirect()->route('cursos.index');
    }
}
