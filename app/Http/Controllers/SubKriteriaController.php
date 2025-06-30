<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubKriteria;
use App\Models\Kriteria;

class SubKriteriaController extends Controller
{
   public function index() {
    $subkriterias = SubKriteria::with('kriteria')->get();
    return view('subkriteria.index', compact('subkriterias'));
}

public function create() {
    $kriterias = Kriteria::all();
    return view('subkriteria.create', compact('kriterias'));
}

public function store(Request $request) {
    $request->validate([
        'nm_sub_kriteria' => 'required',
        'id_kriteria' => 'required',
        'nilai' => 'required|numeric',
    ]);
    SubKriteria::create($request->all());
    return redirect()->route('subkriteria.index')->with('success', 'Sub kriteria ditambahkan');
}

public function edit($id) {
    $sub = SubKriteria::findOrFail($id);
    $kriterias = Kriteria::all();
    return view('subkriteria.edit', compact('sub', 'kriterias'));
}

public function update(Request $request, $id) {
    $request->validate([
        'nm_sub_kriteria' => 'required',
        'id_kriteria' => 'required',
        'nilai' => 'required|numeric',
    ]);
    SubKriteria::findOrFail($id)->update($request->all());
    return redirect()->route('subkriteria.index')->with('success', 'Sub kriteria diubah');
}

public function destroy($id) {
    SubKriteria::destroy($id);
    return back()->with('success', 'Sub kriteria dihapus');
}
}
