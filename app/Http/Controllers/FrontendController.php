<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kegiatan;

class FrontendController extends Controller
{
    // ======================
    // BERANDA
    // ======================
    public function home()
    {
        $berita = Berita::latest()->take(3)->get();
        $kegiatan = Kegiatan::latest()->take(3)->get();

        return view('home', compact('berita', 'kegiatan'));
    }

    // ======================
    // ABOUT
    // ======================
    public function about()
    {
        return view('about');
    }

    // ======================
    // LIST BERITA (PAGINATION FIX)
    // ======================
    public function berita()
    {
        $berita = Berita::latest()->paginate(6); // 🔥 WAJIB paginate
        return view('berita.index', compact('berita'));
    }

    // ======================
    // DETAIL BERITA
    // ======================
    public function beritaShow($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.show', compact('berita'));
    }

    // ======================
    // LIST KEGIATAN (OPTIONAL PAGINATION)
    // ======================
    public function kegiatan()
    {
        $kegiatan = Kegiatan::latest()->paginate(6); // disarankan paginate
        return view('kegiatan.index', compact('kegiatan'));
    }

    // ======================
    // DETAIL KEGIATAN
    // ======================
    public function kegiatanShow($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('kegiatan.show', compact('kegiatan'));
    }
}
