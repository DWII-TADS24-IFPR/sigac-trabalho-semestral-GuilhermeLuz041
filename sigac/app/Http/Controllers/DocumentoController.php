<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    public function index() {
        $documentos = Documento::all();
        return view('admin.documentos.index', compact('documentos'));
    }

    public function create() {
        return view('admin.documentos.create', [
            'categorias' => Categoria::all(),
            'users' => User::all()
        ]);
    }

    public function store(Request $request) {
        Documento::create($request->validate([
            'url' => 'required',
            'descricao' => 'required',
            'horas_in' => 'required',
            'status' => 'required',
            'comentario' => 'required',
            'horas_out' => 'required',
            'categoria_id' => 'required',
            'user_id' => 'required'
        ]));
        return redirect()->route('documentos.index');
    }

    public function edit($id) {
        return view('admin.documentos.edit', [
            'documento' => Documento::findOrFail($id),
            'categorias' => Categoria::all(),
            'users' => User::all()
        ]);
    }

    public function update(Request $request, $id) {
        Documento::findOrFail($id)->update($request->validate([
            'url' => 'required',
            'descricao' => 'required',
            'horas_in' => 'required',
            'status' => 'required',
            'comentario' => 'required',
            'horas_out' => 'required',
            'categoria_id' => 'required',
            'user_id' => 'required'
        ]));
        return redirect()->route('documentos.index');
    }

    public function destroy($id) {
        Documento::findOrFail($id)->delete();
        return redirect()->route('documentos.index');
    }
}
