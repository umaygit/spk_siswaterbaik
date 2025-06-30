<?php

namespace App\Http\Controllers;
use App\Models\Kriteria;

use Illuminate\Http\Request;

class KriteriaController extends Controller
{
public function index() {
    $kriterias = Kriteria::all();
    return view('kriteria.index', compact('kriterias'));
}

public function create() {
    return view('kriteria.create');
}

public function store(Request $request) {
    $request->validate([
        'nama_kriteria' => 'required',
        'kode_kriteria' => 'required|unique:kriterias',
        'bobot' => 'required|numeric|min:0|max:100',
    ]);

    Kriteria::create($request->all());
    return redirect()->route('kriteria.index')->with('success', 'Kriteria ditambahkan');
}

public function edit($id) {
    $kriteria = Kriteria::findOrFail($id);
    return view('kriteria.edit', compact('kriteria'));
}

public function update(Request $request, $id) {
    $kriteria = Kriteria::findOrFail($id);
    $request->validate([
        'nama_kriteria' => 'required',
        'kode_kriteria' => 'required|unique:kriterias,kode_kriteria,'.$id.',id_kriteria',
        'bobot' => 'required|numeric|min:0|max:100',
    ]);
    $kriteria->update($request->all());
    return redirect()->route('kriteria.index')->with('success', 'Kriteria diubah');
}

public function destroy($id) {
    Kriteria::destroy($id);
    return back()->with('success', 'Kriteria dihapus');
}
}