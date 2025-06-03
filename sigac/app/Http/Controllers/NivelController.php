<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    public function index() {
        $niveis = Nivel::all();
        return view('admin.niveis.index', compact('niveis'));
    }

    public function create() {
        return view('admin.niveis.create');
    }

    public function store(Request $request) {

       $request->validate([
            'nome' => 'required|string|max:255',
        ]);
        Nivel::create($request->only('nome'));
        return redirect()->route('admin.niveis.index')->with('success', 'Nível criado com sucesso.');;

    }

    public function edit($id) {
        return view('admin.niveis.edit', [
            'nivel' => Nivel::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id) {
       $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $nivel = Nivel::findOrFail($id);
        $nivel->update($request->only('nome'));

        return redirect()->route('admin.niveis.index')->with('success', 'Nível atualizado com sucesso.');
    }

    public function destroy($id) {
        $nivel = nivel::findOrFail($id);
        $nivel->delete();

        return redirect()->route('admin.niveis.index')->with('success', 'Nível removido com sucesso.');
    }
}
