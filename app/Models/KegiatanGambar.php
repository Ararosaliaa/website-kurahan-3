<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KegiatanGambar extends Model
{
    protected $fillable = [
        'kegiatan_id',
        'gambar',
    ];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
}
