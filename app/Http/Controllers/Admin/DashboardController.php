<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Kegiatan;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'berita' => Berita::count(),
            'kegiatan' => Kegiatan::count(),
        ]);
    }
}
