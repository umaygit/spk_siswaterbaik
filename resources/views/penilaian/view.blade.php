@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Hasil Hitung Penilaian (SMART)</h2>
    
    {{-- Tabel Bobot Normalisasi --}}
    <div class="alert alert-primary">
        <h5 class="mb-1"><i class="fas fa-info-circle"></i> Tabel Nilai Normalisasi Bobot </h5>
       
    </div>
    <table class="table table-sm table-bordered w-50">
        <thead class="thead-light">
            <tr>
                <th>Kode Kriteria</th>
                <th>Bobot</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bobot as $kode => $b)
            <tr>
                <td>{{ $kode }}</td>
                <td>{{ number_format($b, 4) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="alert alert-primary">
    <h5 class="mb-1"><i class="fas fa-info-circle"></i> Nilai Minimal & Nilai Maksimal Kriteria </h5>
    </div>
    <table class="table table-sm table-bordered mb-4">
        <thead class="thead-light">
            <tr>
                <th>Kode Kriteria</th>
                <th>Min</th>
                <th>Max</th>
            </tr>
        </thead>
        <tbody>
            @foreach($minMax['min'] as $kode => $min)
            <tr>
                <td>{{ $kode }}</td>
                <td>{{ $min }}</td>
                <td>{{ $minMax['max'][$kode] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="alert alert-primary">
    <h5 class="mb-1"><i class="fas fa-info-circle"></i> Tabel Nilai ALternatif & Nilai Utility </h5>
    </div>
    <table class="table table-bordered table-striped mb-5">
        <thead class="thead-dark">
            <tr>
                <th>Nama Siswa</th>
                @foreach($kriterias as $kriteria)
                    <th>{{ $kriteria->kode_kriteria }}<br><small>Nilai</small></th>
                    <th><small>Utility</small></th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($siswas as $siswa)
            <tr>
                <td>{{ $siswa->nama_siswa }}</td>
                @foreach($kriterias as $kriteria)
                    @php
                        $penilaian = $penilaians->where('id_siswa', $siswa->id_siswa)
                                        ->where('id_kriteria', $kriteria->id_kriteria)->first();
                        $nilai = $penilaian->nilai ?? 0;
                        $kode = $kriteria->kode_kriteria;
                        $max = $minMax['max'][$kode] ?? 1;
                        $min = $minMax['min'][$kode] ?? 0;
                        $utility = $max != $min ? 100 * (($nilai - $min) / ($max - $min)) : 0;
                    @endphp
                    <td>{{ $nilai }}</td>
                    <td>{{ number_format($utility, 2) }}</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('admin.hasil') }}" class="btn btn-primary">Lihat Peringkat Akhir</a>
</div>
@endsection
