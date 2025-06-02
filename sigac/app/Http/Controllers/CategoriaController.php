<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Curso;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index() {
        $categorias = Categoria::all();
        return view('admin.categorias.index', compact('categorias'));
    }

    public function create() {
        return view('admin.categorias.create', [
            'cursos' => Curso::all()
        ]);
    }

    public function store(Request $request) {
        Categoria::create($request->validate([
            'nome' => 'required',
            'maximo_horas' => 'required',
            'curso_id' => 'required'
        ]));
        return redirect()->route('categorias.index');
    }

    public function edit($id) {
        return view('admin.categorias.edit', [
            'categoria' => Categoria::findOrFail($id),
            'cursos' => Curso::all()
        ]);
    }

    public function update(Request $request, $id) {
        Categoria::findOrFail($id)->update($request->validate([
            'nome' => 'required',
            'maximo_horas' => 'required',
            'curso_id' => 'required'
        ]));
        return redirect()->route('categorias.index');
    }

    public function destroy($id) {
        Categoria::findOrFail($id)->delete();
        return redirect()->route('categorias.index');
    }
}
