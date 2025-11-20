<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
    protected $fillable = [
        'kode_jurusan',
        'nama_jurusan',
    ];

    public function kelas()
    {
        return $this->hasMany(kelas::class);
    }

    public function siswas()
    {
        return $this->hasMany(siswa::class);
    }
}
