<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Curso;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create() {
        return view('admin.users.create', [
            'cursos' => Curso::all(),
            'roles' => Role::all()
        ]);
    }

    public function store(Request $request) {
        User::create($request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'curso_id' => 'required',
            'role_id' => 'required'
        ]));
        return redirect()->route('users.index');
    }

    public function edit($id) {
        return view('admin.users.edit', [
            'user' => User::findOrFail($id),
            'cursos' => Curso::all(),
            'roles' => Role::all()
        ]);
    }

    public function update(Request $request, $id) {
        User::findOrFail($id)->update($request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'curso_id' => 'required',
            'role_id' => 'required'
        ]));
        return redirect()->route('users.index');
    }

    public function destroy($id) {
        User::findOrFail($id)->delete();
        return redirect()->route('users.index');
    }
}
