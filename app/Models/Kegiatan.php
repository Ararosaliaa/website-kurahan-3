<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $fillable = [
        'judul',
        'tanggal',
        'deskripsi',
    ];

    public function gambars()
    {
        return $this->hasMany(KegiatanGambar::class);
    }
}
