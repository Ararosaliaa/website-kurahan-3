@extends('admin.layout')

@section('title', 'Edit Berita')

@section('content')
<form action="{{ route('admin.berita.update', $beritum->id) }}"
      method="POST"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

    {{-- JUDUL --}}
    <div class="mb-3">
        <label class="form-label">Judul</label>
        <input type="text"
               name="judul"
               class="form-control"
               value="{{ old('judul', $beritum->judul) }}"
               required>
    </div>

    {{-- ISI --}}
    <div class="mb-3">
        <label class="form-label">Isi Berita</label>
        <textarea name="isi"
                  class="form-control"
                  rows="5"
                  required>{{ old('isi', $beritum->isi) }}</textarea>
    </div>

    {{-- GAMBAR LAMA --}}
    @if($beritum->gambar)
        <div class="mb-3">
            <label class="form-label">Gambar Saat Ini</label><br>
            <img src="{{ asset('storage/'.$beritum->gambar) }}"
                 class="img-thumbnail mb-2"
                 width="200">
        </div>
    @endif

    {{-- GANTI GAMBAR --}}
    <div class="mb-3">
        <label class="form-label">Ganti Gambar</label>
        <input type="file"
               name="gambar"
               class="form-control"
               accept="image/*"
               onchange="previewImage(this)">
        <small class="text-muted">
            JPG / PNG • Maks 2MB
        </small>
    </div>

    {{-- PREVIEW --}}
    <div class="mb-3">
        <img id="preview"
             class="img-thumbnail d-none"
             width="200">
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('admin.berita.index') }}"
       class="btn btn-secondary">Kembali</a>
</form>

{{-- PREVIEW SCRIPT --}}
<script>
function previewImage(input) {
    const preview = document.getElementById('preview');
    const file = input.files[0];

    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.classList.remove('d-none');
    }
}
</script>
@endsection
