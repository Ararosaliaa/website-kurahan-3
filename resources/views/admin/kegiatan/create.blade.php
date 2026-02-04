@extends('admin.layout')

@section('header', 'Tambah Kegiatan')

@section('content')
<form method="POST"
      action="{{ route('admin.kegiatan.store') }}"
      enctype="multipart/form-data">
@csrf

<div class="mb-3">
    <label>Judul</label>
    <input type="text" name="judul" class="form-control" required>
</div>

<div class="mb-3">
    <label>Tanggal</label>
    <input type="date" name="tanggal" class="form-control" required>
</div>

<div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
</div>

{{-- 🔥 MULTI GAMBAR --}}
<div class="mb-3">
    <label class="form-label">Gambar Kegiatan</label>
    <input type="file"
           name="gambar[]"
           class="form-control"
           accept="image/*"
           multiple
           onchange="previewImages(this)">
    <small class="text-muted">
        Maksimal 2MB per foto (JPG, PNG)
    </small>
</div>

{{-- 🔥 PREVIEW MULTI --}}
<div class="row" id="preview-container"></div>

<button class="btn btn-success mt-3">Simpan</button>
<a href="{{ route('admin.kegiatan.index') }}" class="btn btn-secondary mt-3">
    Kembali
</a>
</form>

{{-- 🔥 SCRIPT PREVIEW --}}
<script>
function previewImages(input) {
    const container = document.getElementById('preview-container');
    container.innerHTML = '';

    if (input.files) {
        Array.from(input.files).forEach(file => {
            const reader = new FileReader();
            reader.onload = e => {
                const col = document.createElement('div');
                col.className = 'col-md-3 mb-3';

                col.innerHTML = `
                    <img src="${e.target.result}"
                         class="img-fluid rounded shadow-sm">
                `;

                container.appendChild(col);
            };
            reader.readAsDataURL(file);
        });
    }
}
</script>
@endsection
