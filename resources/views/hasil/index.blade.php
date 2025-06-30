@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Hasil Penilaian Prestasi Siswa</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Deskripsi -->
    <div class="alert alert-info">
        <h5><i class="fas fa-info-circle"></i> Metode SMART</h5>
        <p>Berikut adalah hasil perhitungan menggunakan metode <strong>Simple Multi Attribute Rating Technique</strong> (SMART).</p>
    </div>

    <!-- Tombol Unduh PDF -->
    <div class="mb-3">
        <a href="{{ route('admin.hasil.pdf') }}" class="btn btn-danger">
            <i class="fas fa-file-pdf"></i> Unduh PDF
        </a>
    </div>

    <!-- Tabel Hasil -->
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th class="text-center">Peringkat</th>
                <th>Nama Siswa</th>
                <th class="text-center">Nilai Akhir</th>
                <th class="text-center">Kategori</th>
                <th class="text-center">Predikat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hasil as $item)
            <tr>
                <td class="text-center">
                    {{ $item->peringkat }}
                    <!-- @if($item->peringkat == 1)
                        <span class="badge badge-success ml-1">Juara 1</span>
                    @elseif($item->peringkat == 2)
                        <span class="badge badge-info ml-1">Juara 2</span>
                    @elseif($item->peringkat == 3)
                        <span class="badge badge-secondary ml-1">Juara 3</span>
                    @endif -->
                </td>
                <td>{{ $item->siswa->nama_siswa }}</td>
                <td class="text-center">{{ number_format($item->nilai_akhir, 2) }}</td>
                <td class="text-center">
                    @php $nilai = $item->nilai_akhir; @endphp
                    @if($nilai >= 90)
                        <span class="badge badge-success">Sangat Baik</span>
                    @elseif($nilai >= 80)
                        <span class="badge badge-primary">Baik</span>
                    @elseif($nilai >= 70)
                        <span class="badge badge-warning">Cukup</span>
                    @elseif($nilai >= 60)
                        <span class="badge badge-danger">Kurang</span>
                    @else
                        <span class="badge badge-dark">Sangat Kurang</span>
                    @endif
                </td>
                <td class="text-center">{{ $item->nilai_akhir >= 70 ? 'Berprestasi' : 'Belum Berprestasi' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
