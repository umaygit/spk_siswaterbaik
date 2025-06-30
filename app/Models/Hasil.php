<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    protected $primaryKey = 'id_hasil';
    protected $fillable = ['id_siswa', 'nilai_akhir', 'peringkat'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }
}
