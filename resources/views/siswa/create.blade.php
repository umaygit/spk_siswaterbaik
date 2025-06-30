@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Tambah Siswa</h2>
    <form method="POST" action="{{ route('admin.siswa.store') }}">
        @csrf
        <div class="form-group">
            <label>NIS</label>
            <input type="text" class="form-control" name="nis" required>
        </div>
        <div class="form-group">
            <label>Nama Siswa</label>
            <input type="text" class="form-control" name="nama_siswa" required>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label>Kelas</label>
            <select name="kelas" class="form-control" required>
                <option value="">-- Pilih Kelas --</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
