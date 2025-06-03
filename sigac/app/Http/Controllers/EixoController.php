<?php

namespace App\Http\Controllers;

use App\Models\Eixo;
use Illuminate\Http\Request;

class EixoController extends Controller
{
    public function index()
    {
        $eixos = Eixo::all();
        return view('admin.eixos.index', compact('eixos'));
    }

    public function create()
    {
        return view('admin.eixos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        Eixo::create($request->only('nome'));

        return redirect()->route('admin.eixos.index')->with('success', 'Eixo criado com sucesso.');
    }

    public function show($id)
    {
        $eixo = Eixo::findOrFail($id);
        return view('admin.eixos.show', compact('eixo'));
    }

    public function edit($id)
    {
        $eixo = Eixo::findOrFail($id);
        return view('admin.eixos.edit', compact('eixo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $eixo = Eixo::findOrFail($id);
        $eixo->update($request->only('nome'));

        return redirect()->route('admin.eixos.index')->with('success', 'Eixo atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $eixo = Eixo::findOrFail($id);
        $eixo->delete();

        return redirect()->route('admin.eixos.index')->with('success', 'Eixo removido com sucesso.');
    }
}
