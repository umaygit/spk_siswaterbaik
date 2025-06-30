<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{

public function index() {
    $siswas = Siswa::all();
    return view('siswa.index', compact('siswas'));
}

public function create() {
    return view('siswa.create');
}

public function store(Request $request) {
    $request->validate([
        'nis' => 'required|unique:siswas',
        'nama_siswa' => 'required',
        'jenis_kelamin' => 'required|in:L,P',
        'kelas' => 'required',
    ]);
    Siswa::create($request->all());
    return redirect()->route('siswa.index')->with('success', 'Siswa ditambahkan');
}

public function edit($id) {
    $siswa = Siswa::findOrFail($id);
    return view('siswa.edit', compact('siswa'));
}

public function update(Request $request, $id) {
    $request->validate([
        'nis' => 'required|unique:siswas,nis,'.$id.',id_siswa',
        'nama_siswa' => 'required',
        'jenis_kelamin' => 'required|in:L,P',
        'kelas' => 'required',
    ]);
    Siswa::findOrFail($id)->update($request->all());
    return redirect()->route('admin.siswa.index')->with('success', 'Siswa diubah');
}

public function destroy($id) {
    Siswa::destroy($id);
    return back()->with('success', 'Siswa dihapus');
}

}
