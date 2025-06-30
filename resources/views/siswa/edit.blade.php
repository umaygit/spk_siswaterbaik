@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Siswa</h2>
    <form method="POST" action="{{ route('admin.siswa.update', $siswa->id_siswa) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>NIS</label>
            <input type="text" class="form-control" name="nis" value="{{ $siswa->nis }}" required>
        </div>
        <div class="form-group">
            <label>Nama Siswa</label>
            <input type="text" class="form-control" name="nama_siswa" value="{{ $siswa->nama_siswa }}" required>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="L" {{ $siswa->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ $siswa->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label>Kelas</label>
            <input type="text" class="form-control" name="kelas" value="{{ $siswa->kelas }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
