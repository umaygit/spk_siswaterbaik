<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubKriteria extends Model
{
    protected $primaryKey = 'id_sub_kriteria';
    protected $fillable = ['id_kriteria', 'nm_sub_kriteria', 'nilai'];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'id_kriteria');
    }
}
