<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index() {
        $resources = Resource::all();
        return view('admin.resources.index', compact('resources'));
    }

    public function create() {
        return view('admin.resources.create');
    }

    public function store(Request $request) {
        Resource::create($request->validate(['nome' => 'required']));
        return redirect()->route('resources.index');
    }

    public function edit($id) {
        return view('admin.resources.edit', [
            'resource' => Resource::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id) {
        Resource::findOrFail($id)->update($request->validate(['nome' => 'required']));
        return redirect()->route('resources.index');
    }

    public function destroy($id) {
        Resource::findOrFail($id)->delete();
        return redirect()->route('resources.index');
    }
}
