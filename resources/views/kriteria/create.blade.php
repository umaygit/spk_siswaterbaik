@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Tambah Kriteria</h2>
    <form method="POST" action="{{ route('admin.kriteria.store') }}">
        @csrf
        <div class="form-group">
            <label>Nama Kriteria</label>
            <input type="text" class="form-control" name="nama_kriteria" required>
        </div>
        <div class="form-group">
            <label>Kode Kriteria</label>
            <input type="text" class="form-control" name="kode_kriteria" required>
        </div>
        <div class="form-group">
            <label>Bobot (%)</label>
            <input type="number" class="form-control" name="bobot" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
