<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index() {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function create() {
        return view('admin.roles.create');
    }

    public function store(Request $request) {
        Role::create($request->validate(['nome' => 'required']));
        return redirect()->route('roles.index');
    }

    public function edit($id) {
        return view('admin.roles.edit', [
            'role' => Role::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id) {
        Role::findOrFail($id)->update($request->validate(['nome' => 'required']));
        return redirect()->route('roles.index');
    }

    public function destroy($id) {
        Role::findOrFail($id)->delete();
        return redirect()->route('roles.index');
    }
}
