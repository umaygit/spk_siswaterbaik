<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use App\Models\Penilaian;
use App\Models\Hasil;

class SpkController extends Controller
{
    public function dashboard()
    {
        $jumlah_siswa = Siswa::count();
        $jumlah_kriteria = Kriteria::count();
        $jumlah_penilaian = Penilaian::count();

        return view('dashboard', compact('jumlah_siswa', 'jumlah_kriteria', 'jumlah_penilaian'));
    }


    public function dataPenilaian()
    {
    $siswas = Siswa::with(['penilaians.kriteria'])->get();
    return view('penilaian.index', compact('siswas'));
    }
    
    
}
