@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>📋 Data Penilaian</h4>
        <div>
            <a href="{{ route('admin.penilaian.input') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Tambah Nilai
            </a>
            <a href="{{ route('admin.penilaian.view') }}" class="btn btn-primary">
                <i class="fas fa-calculator"></i> Hitung
            </a>
        </div>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="thead-light text-center">
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Alternatif</th>
                @for ($i = 1; $i <= 5; $i++)
                    <th>K{{ $i }}</th>
                @endfor
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswas as $no => $siswa)
                <tr>
                    <td class="text-center">{{ $no + 1 }}</td>
                    <td>{{ $siswa->kode ?? 'A' . ($no + 1) }}</td>
                    <td>{{ $siswa->nama_siswa }}</td>

                    {{-- Ambil nilai dari penilaian berdasarkan kode_kriteria --}}
                    @for ($i = 1; $i <= 5; $i++)
                        @php
                            $kode = 'K' . $i;
                            $nilai = $siswa->penilaians->firstWhere('kriteria.kode_kriteria', $kode)->nilai ?? '-';
                        @endphp
                        <td class="text-center">{{ $nilai }}</td>
                    @endfor

                    <td class="text-center">
                        <!-- <a href="#" class="btn btn-info btn-sm">Lihat</a> -->
                        <a href="{{ route('admin.penilaian.edit.siswa', $siswa->id_siswa) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="#" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
