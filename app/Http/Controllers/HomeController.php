<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Berita;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'kegiatan' => Kegiatan::with('gambars')
                ->latest()
                ->take(6)
                ->get(),

            'berita' => Berita::latest()
                ->take(6)
                ->get(),
        ]);
    }
}
