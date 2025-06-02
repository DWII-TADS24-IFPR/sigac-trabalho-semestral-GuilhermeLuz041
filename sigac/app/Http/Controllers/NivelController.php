<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    public function index() {
        $nivels = Nivel::all();
        return view('admin.nivels.index', compact('nivels'));
    }

    public function create() {
        return view('admin.nivels.create');
    }

    public function store(Request $request) {
        Nivel::create($request->validate(['nome' => 'required']));
        return redirect()->route('nivels.index');
    }

    public function edit($id) {
        return view('admin.nivels.edit', [
            'nivel' => Nivel::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id) {
        Nivel::findOrFail($id)->update($request->validate(['nome' => 'required']));
        return redirect()->route('nivels.index');
    }

    public function destroy($id) {
        Nivel::findOrFail($id)->delete();
        return redirect()->route('nivels.index');
    }
}
