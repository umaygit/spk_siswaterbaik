@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Kriteria</h2>
    <form method="POST" action="{{ route('admin.kriteria.update', $kriteria->id_kriteria) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nama Kriteria</label>
            <input type="text" class="form-control" name="nama_kriteria" value="{{ $kriteria->nama_kriteria }}" required>
        </div>
        <div class="form-group">
            <label>Kode Kriteria</label>
            <input type="text" class="form-control" name="kode_kriteria" value="{{ $kriteria->kode_kriteria }}" required>
        </div>
        <div class="form-group">
            <label>Bobot (%)</label>
            <input type="number" class="form-control" name="bobot" value="{{ $kriteria->bobot }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
