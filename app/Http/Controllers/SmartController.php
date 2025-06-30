<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use App\Models\Penilaian;
use App\Models\Hasil;
use Barryvdh\DomPDF\Facade\Pdf;

class SmartController extends Controller
{
    public function inputPenilaianForm(Request $request)
    {
        $id_siswa = $request->id_siswa;

        $allSiswas = Siswa::all();
        $selectedSiswa = null;

        if ($id_siswa) {
            $selectedSiswa = Siswa::find($id_siswa);
        }

        $kriterias = Kriteria::with('subKriterias')->get();

        return view('penilaian.input', compact('allSiswas', 'selectedSiswa', 'kriterias'));
    }

    public function simpanPenilaian(Request $request)
{
    // Jika berasal dari halaman edit siswa (edit_siswa_id dikirim)
    if ($request->filled('edit_siswa_id')) {
        $id_siswa = $request->edit_siswa_id;

        foreach ($request->nilai as $id_kriteria => $id_sub_kriteria) {
            $nilai = SubKriteria::find($id_sub_kriteria)?->nilai ?? 0;

            Penilaian::updateOrCreate(
                ['id_siswa' => $id_siswa, 'id_kriteria' => $id_kriteria],
                ['id_sub_kriteria' => $id_sub_kriteria, 'nilai' => $nilai]
            );
        }

        // Tambahkan ini
        $this->calculateFinalScores();

        return redirect()->route('admin.penilaian.index')->with('success', 'Penilaian berhasil diperbarui dan dihitung.');
    }

    // Jika berasal dari input banyak siswa
    foreach ($request->nilai as $id_siswa => $nilai_kriteria) {
        foreach ($nilai_kriteria as $id_kriteria => $id_sub_kriteria) {
            $nilai = SubKriteria::find($id_sub_kriteria)?->nilai ?? 0;

            Penilaian::updateOrCreate(
                ['id_siswa' => $id_siswa, 'id_kriteria' => $id_kriteria],
                ['id_sub_kriteria' => $id_sub_kriteria, 'nilai' => $nilai]
            );
        }
    }

    // Tambahkan ini juga
    $this->calculateFinalScores();

    return redirect()->route('penilaian.input')->with('success', 'Penilaian berhasil disimpan dan dihitung.');
}

    public function calculateMinMax()
    {
        $minValues = [];
        $maxValues = [];
        $kriterias = Kriteria::all();

        foreach ($kriterias as $kriteria) {
            $nilai = Penilaian::where('id_kriteria', $kriteria->id_kriteria)->pluck('nilai');
            $maxValues[$kriteria->kode_kriteria] = $nilai->max();
            $minValues[$kriteria->kode_kriteria] = $nilai->min();
        }

        return ['min' => $minValues, 'max' => $maxValues];
    }

    public function calculateUtility()
    {
        $penilaians = Penilaian::all();
        $minMax = $this->calculateMinMax();
        $utilities = [];

        foreach ($penilaians as $p) {
            $kode = $p->kriteria->kode_kriteria;
            $max = $minMax['max'][$kode] ?? 1;
            $min = $minMax['min'][$kode] ?? 0;

            $utilities[$p->id_penilaian] = ($max - $min) == 0 ? 0 : 100 * ($p->nilai - $min) / ($max - $min);
        }

        return $utilities;
    }

    public function calculateBobot()
    {
        $kriterias = Kriteria::all();
        $total = $kriterias->sum('bobot');
        $bobot = [];

        foreach ($kriterias as $k) {
            $bobot[$k->kode_kriteria] = $k->bobot / $total;
        }

        return $bobot;
    }

    public function calculateFinalScores()
    {
        $siswas = Siswa::all();
        $kriterias = Kriteria::all();
        $utilities = $this->calculateUtility();
        $bobot = $this->calculateBobot();
        $finalScores = [];

        foreach ($siswas as $siswa) {
            $total = 0;
            foreach ($kriterias as $kriteria) {
                $penilaian = Penilaian::where('id_siswa', $siswa->id_siswa)
                    ->where('id_kriteria', $kriteria->id_kriteria)
                    ->first();

                if ($penilaian) {
                    $utility = $utilities[$penilaian->id_penilaian] ?? 0;
                    $total += $utility * ($bobot[$kriteria->kode_kriteria] ?? 0);
                }
            }

            $finalScores[$siswa->id_siswa] = $total;

            Hasil::updateOrCreate(
                ['id_siswa' => $siswa->id_siswa],
                ['nilai_akhir' => $total]
            );
        }

        $peringkat = 1;
        foreach (Hasil::orderByDesc('nilai_akhir')->get() as $hasil) {
            $hasil->peringkat = $peringkat++;
            $hasil->save();
        }

        return $finalScores;
    }

    public function view()
    {
        $siswas = Siswa::all();
        $kriterias = Kriteria::all();
        $penilaians = Penilaian::all();
        $minMax = $this->calculateMinMax();
        $utilities = $this->calculateUtility();
        $finalScores = $this->calculateFinalScores();
        $bobot = $this->calculateBobot();
        $hasil = Hasil::with('siswa')->orderBy('peringkat')->get();

        return view('penilaian.view', compact(
            'siswas', 'kriterias', 'penilaians', 'minMax', 'utilities', 'finalScores', 'bobot', 'hasil'
        ));
    }

    public function hasil()
    {
        $hasil = Hasil::with('siswa')->orderBy('peringkat')->get();
        return view('hasil.index', compact('hasil'));
    }

    public function subkriteria()
    {
        $subkriterias = SubKriteria::with('kriteria')->get();
        return view('subkriteria.index', compact('subkriterias'));
    }

    public function kriteria()
    {
        $kriterias = Kriteria::all();
        return view('kriteria.index', compact('kriterias'));
    }

    public function editSiswa($id_siswa)
    {
    $siswa = \App\Models\Siswa::with(['penilaians.kriteria'])->findOrFail($id_siswa);
    $kriterias = \App\Models\Kriteria::with('subKriterias')->get();

    return view('penilaian.edit_siswa', compact('siswa', 'kriterias'));
    }

    public function edit($id)
    {
    return "Halaman edit belum dibuat untuk ID: " . $id;
    }
    

    public function exportPdf()
    {
    $hasil = Hasil::with('siswa')->orderBy('peringkat')->get(); // sesuaikan model
    $pdf = PDF::loadView('hasil.hasil_pdf', compact('hasil'))->setPaper('a4', 'portrait');
    return $pdf->download('laporan_hasil_siswa.pdf');
    }
    
    
}