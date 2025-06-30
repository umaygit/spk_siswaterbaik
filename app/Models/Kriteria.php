<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $primaryKey = 'id_kriteria';
    protected $fillable = ['nama_kriteria', 'kode_kriteria', 'bobot'];

    public function subKriterias()
    {
        return $this->hasMany(SubKriteria::class, 'id_kriteria');
    }

    public function penilaians()
    {
        return $this->hasMany(Penilaian::class, 'id_kriteria');
    }
}
