@extends('layouts.app')

@section('content')
<div class="container mt-4">
     <!-- Deskripsi Sistem -->
     <div class="alert alert-info">
                        <h5 class="mb-1"><i class="fas fa-info-circle"></i> Tentang Sistem</h5>
                        <p class="mb-0">Sistem ini digunakan untuk membantu menentukan siswa berprestasi berdasarkan kriteria dan subkriteria penilaian. Gunakan menu di sidebar untuk mengelola data siswa, kriteria, dan penilaian.</p>
                    </div>

                    <!-- Statistik -->
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="card text-white bg-primary mb-3">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h6 class="card-title">Jumlah Siswa</h6>
                                            <p class="card-text">{{ $jumlah_siswa }}</p>
                                        </div>
                                        <div class="ml-3">
                                            <i class="fas fa-users fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-white bg-success mb-3">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h6 class="card-title">Jumlah Kriteria</h6>
                                            <p class="card-text">{{ $jumlah_kriteria }}</p>
                                        </div>
                                        <div class="ml-3">
                                            <i class="fas fa-balance-scale fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-white bg-warning mb-3">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h6 class="card-title">Data Penilaian</h6>
                                            <p class="card-text">{{ $jumlah_penilaian }}</p>
                                        </div>
                                        <div class="ml-3">
                                            <i class="fas fa-clipboard-check fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    <div class="row">
        

        <!-- Kolom Kiri -->
        <div class="col-md-4">
            <div class="card mb-3 text-center">
                <div class="card-body">
                    <img src="{{ asset('images/logo_dikbud.png') }}" alt="Logo Sekolah" width="80">
                    <h5 class="mt-2">Sekolah Dasar Negeri (SDN)<br>2 Sepit</h5>
                    <small class="text-muted">SPK Siswa Berprestasi</small>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-info-circle"></i> Info Sekolah
                </div>
                <div class="card-body">
                    <p><i class="fas fa-map-marker-alt"></i> <strong>Alamat</strong><br>
                    JL H. Hasan No.100, RT.6/RW.6, Sepit Kec. Keruak - LOTIM</p>
                    <p><i class="fas fa-map-pin"></i> <strong>Provinsi</strong><br>
                    Nusa Tenggara Barat</p>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan -->
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header bg-light">
                    <strong>Info Sekolah</strong>
                </div>
                <div class="card-body">
                    <h4>Sekolah Dasar Negeri (SDN) 2 Sepit</h4>
                    <p>Selamat Datang di Sistem Pendukung Keputusan SPK Siswa Berprestasi (SDN) 2 Sepit</p>

                   

                    <!-- Langkah SMART -->
                    <h5>Langkah-langkah Metode SMART</h5>
                    <ol>
                        <li>Menentukan kriteria-kriteria yang akan digunakan dalam pengambilan keputusan.</li>
                        <li>Memberikan bobot pada setiap kriteria berdasarkan tingkat kepentingannya.</li>
                        <li>Memberikan nilai pada setiap alternatif untuk setiap kriteria.</li>
                        <li>Menormalisasi nilai alternatif untuk setiap kriteria.</li>
                        <li>Menghitung nilai akhir dengan mengalikan nilai normalisasi dengan bobot kriteria.</li>
                        <li>Mengurutkan alternatif berdasarkan nilai akhir tertinggi.</li>
                    </ol>

                    <p>Langkah-langkah perhitungan SMART adalah:</p>
                    <ol>
                        <li>Pengumpulan data siswa dan kriteria penilaian.</li>
                        <li>Penentuan bobot setiap kriteria berdasarkan kepentingan.</li>
                        <li>Pemberian nilai pada setiap siswa untuk setiap kriteria.</li>
                        <li>Perhitungan nilai utility menggunakan rumus normalisasi.</li>
                        <li>Perhitungan nilai akhir dengan mengalikan utility dan bobot.</li>
                        <li>Pengurutan siswa berdasarkan nilai akhir tertinggi.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="text-center mt-4">
        <small class="text-muted">Copyright © 2025 
            <strong><a href="#">SPK Siswa Berprestasi</a></strong> |
            <strong><a href="#">SDN 2 Sepit</a></strong>. All rights reserved.
        </small>
    </div>
</div>
@endsection
