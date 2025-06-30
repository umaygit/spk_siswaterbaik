@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Data Sub Kriteria</h2>
        <a href="{{ route('admin.subkriteria.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Kriteria</th>
                <th>Sub Kriteria</th>
                <th>Nilai</th>
                <th width="130px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subkriterias as $s)
            <tr>
                <td>{{ $s->kriteria->nama_kriteria }}</td>
                <td>{{ $s->nm_sub_kriteria }}</td>
                <td class="text-center align-middle">{{ $s->nilai }}</td>
                <td class="text-center align-middle">
                    <a href="{{ route('admin.subkriteria.edit', $s->id_sub_kriteria) }}" class="btn btn-sm btn-warning">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.subkriteria.destroy', $s->id_sub_kriteria) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
