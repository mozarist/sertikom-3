<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tahun_ajar extends Model
{

    protected $fillable = [
        'kode_tahun_ajar',
        'nama_tahun_ajar',
    ];

    public function siswa()
    {
        return $this->hasManyThrough(
            siswa::class,kelas_detail::class,
            'tahun_ajar_id','id','id','siswa_id'
        )->distinct();
    }


    public function siswas()
    {
        return $this->hasMany(siswa::class);
    }

    public function kelas_details()
    {
        return $this->hasMany(kelas_detail::class);
    }
}
