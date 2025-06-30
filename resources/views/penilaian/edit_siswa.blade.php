@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h4>Edit Penilaian: {{ $siswa->nama_siswa }}</h4>
    <form method="POST" action="{{ route('admin.penilaian.simpan') }}">
        @csrf
        <input type="hidden" name="edit_siswa_id" value="{{ $siswa->id_siswa }}">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kriteria</th>
                    <th>Sub Kriteria</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kriterias as $kriteria)
                    @php
                        $selected = $siswa->penilaians->firstWhere('id_kriteria', $kriteria->id_kriteria)?->id_sub_kriteria;
                    @endphp
                    <tr>
                        <td>{{ $kriteria->nama_kriteria }}</td>
                        <td>
                            <select name="nilai[{{ $kriteria->id_kriteria }}]" class="form-control">
                                <option value="">-- Pilih --</option>
                                @foreach($kriteria->subKriterias as $sub)
                                    <option value="{{ $sub->id_sub_kriteria }}" {{ $sub->id_sub_kriteria == $selected ? 'selected' : '' }}>
                                        {{ $sub->nm_sub_kriteria }} ({{ $sub->nilai }})
                                    </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('admin.penilaian.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
