<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        $data = Kegiatan::all();
        return view('admin.kegiatan.index', compact('data'));
    }

    public function create()
    {
        return view('admin.kegiatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required|date'
        ]);

        Kegiatan::create($request->all());
        return redirect('/admin/kegiatan')->with('success', 'Kegiatan ditambahkan');
    }

    public function edit(Kegiatan $kegiatan)
    {
        return view('admin.kegiatan.edit', compact('kegiatan'));
    }

    public function update(Request $request, Kegiatan $kegiatan)
    {
        $kegiatan->update($request->all());
        return redirect('/admin/kegiatan')->with('success', 'Kegiatan diupdate');
    }

    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();
        return back()->with('success', 'Kegiatan dihapus');
    }
}
