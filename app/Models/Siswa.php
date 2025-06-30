<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $primaryKey = 'id_siswa';
    protected $fillable = ['nis', 'nama_siswa', 'jenis_kelamin', 'kelas'];

    public function penilaians()
    {
        return $this->hasMany(Penilaian::class, 'id_siswa');
    }

    public function hasil()
    {
        return $this->hasOne(Hasil::class, 'id_siswa');
    }
}
