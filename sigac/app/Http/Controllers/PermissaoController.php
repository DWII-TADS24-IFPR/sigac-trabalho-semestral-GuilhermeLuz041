<?php

namespace App\Http\Controllers;

use App\Models\Permissao;
use App\Models\Role;
use App\Models\Resource;
use Illuminate\Http\Request;

class PermissaoController extends Controller
{
    public function index() {
        $permissoes = Permissao::all();
        return view('admin.permissoes.index', compact('permissoes'));
    }

    public function create() {
        return view('admin.permissoes.create', [
            'roles' => Role::all(),
            'resources' => Resource::all()
        ]);
    }

    public function store(Request $request) {
        Permissao::create($request->validate([
            'role_id' => 'required',
            'resource_id' => 'required',
            'permission' => 'required|boolean'
        ]));
        return redirect()->route('permissoes.index');
    }

    public function edit($id) {
        return view('admin.permissoes.edit', [
            'permissao' => Permissao::findOrFail($id),
            'roles' => Role::all(),
            'resources' => Resource::all()
        ]);
    }

    public function update(Request $request, $id) {
        Permissao::findOrFail($id)->update($request->validate([
            'role_id' => 'required',
            'resource_id' => 'required',
            'permission' => 'required|boolean'
        ]));
        return redirect()->route('permissoes.index');
    }

    public function destroy($id) {
        Permissao::findOrFail($id)->delete();
        return redirect()->route('permissoes.index');
    }
}
