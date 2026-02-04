<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\KegiatanGambar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    // ===============================
    // INDEX
    // ===============================
    public function index()
    {
        $data = Kegiatan::with('gambars')
            ->latest()
            ->paginate(10);

        return view('admin.kegiatan.index', compact('data'));
    }

    // ===============================
    // CREATE
    // ===============================
    public function create()
    {
        return view('admin.kegiatan.create');
    }

    // ===============================
    // STORE
    // ===============================
    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'tanggal'   => 'required|date',
            'deskripsi' => 'required',
            'gambar.*'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $kegiatan = Kegiatan::create([
            'judul'     => $request->judul,
            'tanggal'   => $request->tanggal,
            'deskripsi' => $request->deskripsi,
        ]);

        // SIMPAN MULTI GAMBAR
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $path = $file->store('kegiatan', 'public');

                $kegiatan->gambars()->create([
                    'gambar' => $path
                ]);
            }
        }

        return redirect()
            ->route('admin.kegiatan.index')
            ->with('success', 'Kegiatan berhasil ditambahkan');
    }

    // ===============================
    // EDIT
    // ===============================
    public function edit(Kegiatan $kegiatan)
    {
        $kegiatan->load('gambars');
        return view('admin.kegiatan.edit', compact('kegiatan'));
    }

    // ===============================
    // UPDATE
    // ===============================
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'tanggal'   => 'required|date',
            'deskripsi' => 'required',
            'gambar.*'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $kegiatan->update([
            'judul'     => $request->judul,
            'tanggal'   => $request->tanggal,
            'deskripsi' => $request->deskripsi,
        ]);

        // TAMBAH FOTO BARU (TANPA HAPUS LAMA)
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $path = $file->store('kegiatan', 'public');

                $kegiatan->gambars()->create([
                    'gambar' => $path
                ]);
            }
        }

        return redirect()
            ->route('admin.kegiatan.index')
            ->with('success', 'Kegiatan berhasil diperbarui');
    }

    // ===============================
    // DESTROY
    // ===============================
    public function destroy(Kegiatan $kegiatan)
    {
        foreach ($kegiatan->gambars as $img) {
            Storage::disk('public')->delete($img->gambar);
            $img->delete();
        }

        $kegiatan->delete();

        return back()->with('success', 'Kegiatan berhasil dihapus');
    }

    // ===============================
    // HAPUS GAMBAR SATUAN
    // ===============================
    public function destroyGambar($id)
    {
        $gambar = KegiatanGambar::findOrFail($id);

        Storage::disk('public')->delete($gambar->gambar);
        $gambar->delete();

        return back()->with('success', 'Foto berhasil dihapus');
    }
}
