@extends('admin.layout')

@section('content')
<h3 class="mb-3">Tambah Berita</h3>

<form method="POST" action="/admin/berita" enctype="multipart/form-data">
    @csrf

    {{-- Judul --}}
    <div class="mb-3">
        <label class="form-label">Judul Berita</label>
        <input type="text"
               name="judul"
               class="form-control"
               placeholder="Judul berita"
               required>
    </div>

    {{-- Isi --}}
    <div class="mb-3">
        <label class="form-label">Isi Berita</label>
        <textarea name="isi"
                  class="form-control"
                  rows="5"
                  placeholder="Isi berita"
                  required></textarea>
    </div>

    {{-- Gambar --}}
    <div class="mb-3">
        <label class="form-label">Gambar Berita</label>
        <input type="file"
               name="gambar"
               class="form-control"
               accept="image/*"
               onchange="previewImage(this)">

        <small class="text-muted">
            Format: JPG, JPEG, PNG • Maksimal 2 MB
        </small>
    </div>

    {{-- Preview --}}
    <div class="mb-3">
        <img id="preview"
             style="max-width: 300px; display: none;"
             class="img-thumbnail">
    </div>

    <button class="btn btn-success">
        Simpan
    </button>
    <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">
        Kembali
    </a>
</form>

{{-- Script Preview --}}
<script>
function previewImage(input) {
    const preview = document.getElementById('preview');
    const file = input.files[0];

    if (file) {
        preview.style.display = 'block';
        preview.src = URL.createObjectURL(file);
    }
}
</script>
@endsection
