<?php

namespace App\Http\Controllers;

use App\Models\Eixo;
use Illuminate\Http\Request;

class EixoController extends Controller
{
    public function index() {
        $eixos = Eixo::all();
        return view('admin.eixos.index', compact('eixos'));
    }

    public function create() {
        return view('admin.eixos.create');
    }

    public function store(Request $request) {
        Eixo::create($request->validate(['nome' => 'required']));
        return redirect()->route('eixos.index');
    }

    public function edit($id) {
        return view('admin.eixos.edit', [
            'eixo' => Eixo::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id) {
        Eixo::findOrFail($id)->update($request->validate(['nome' => 'required']));
        return redirect()->route('eixos.index');
    }

    public function destroy($id) {
        Eixo::findOrFail($id)->delete();
        return redirect()->route('eixos.index');
    }
}
