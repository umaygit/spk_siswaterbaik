@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Input Penilaian</h2>

    {{-- Dropdown Pilih Siswa --}}
    <form method="GET" action="{{ route('admin.penilaian.input') }}" class="form-inline mb-3">
        <label class="mr-2">Pilih Siswa:</label>
        <select name="id_siswa" class="form-control mr-2" required>
            <option value="">-- Pilih --</option>
            @foreach($allSiswas as $s)
                <option value="{{ $s->id_siswa }}" {{ request('id_siswa') == $s->id_siswa ? 'selected' : '' }}>
                    {{ $s->nama_siswa }}
                </option>
            @endforeach
        </select>
        <button class="btn btn-primary">Tampilkan</button>
    </form>

    {{-- Jika siswa dipilih, tampilkan form penilaian --}}
    @if($selectedSiswa)
        <div class="alert alert-info">Penilaian untuk: <strong>{{ $selectedSiswa->nama_siswa }}</strong></div>

        <form method="POST" action="{{ route('admin.penilaian.simpan') }}">
            @csrf
            <input type="hidden" name="edit_siswa_id" value="{{ $selectedSiswa->id_siswa }}">

            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        @foreach($kriterias as $kriteria)
                            <th>{{ $kriteria->nama_kriteria }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach($kriterias as $kriteria)
                            <td>
                                <select class="form-control" name="nilai[{{ $kriteria->id_kriteria }}]" required>
                                    <option value="">-- Pilih --</option>
                                    @foreach($kriteria->subKriterias as $sub)
                                        <option value="{{ $sub->id_sub_kriteria }}">
                                            {{ $sub->nm_sub_kriteria }} ({{ $sub->nilai }})
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                        @endforeach
                    </tr>
                </tbody>
            </table>

            <button type="submit" class="btn btn-success">Simpan Penilaian</button>
            <a href="{{ route('admin.penilaian.view') }}" class="btn btn-info ml-2">Lihat Hasil</a>
        </form>
    @endif
</div>
@endsection
