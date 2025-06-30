@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Kriteria</h2>
        <a href="{{ route('admin.kriteria.create') }}" class="btn btn-primary">Tambah</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>Bobot (%)</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kriterias as $k)
            <tr>
                <td>{{ $k->kode_kriteria }}</td>
                <td>{{ $k->nama_kriteria }}</td>
                <td>{{ $k->bobot }}</td>
                <td>
                    <a href="{{ route('admin.kriteria.edit', $k->id_kriteria) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.kriteria.destroy', $k->id_kriteria) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
