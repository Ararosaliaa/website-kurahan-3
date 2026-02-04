@extends('admin.layout')

@section('title','Edit Kegiatan')

@section('content')

{{-- FORM UPDATE --}}
<form method="POST"
      action="{{ route('admin.kegiatan.update',$kegiatan->id) }}"
      enctype="multipart/form-data">
@csrf
@method('PUT')

<input type="text" name="judul" value="{{ $kegiatan->judul }}" class="form-control mb-2">
<input type="date" name="tanggal" value="{{ $kegiatan->tanggal }}" class="form-control mb-2">
<textarea name="deskripsi" class="form-control mb-3">{{ $kegiatan->deskripsi }}</textarea>

<label>Tambah Foto Baru</label>
<input type="file" name="gambar[]" multiple class="form-control mb-3">

<button class="btn btn-primary">Update</button>
<a href="{{ route('admin.kegiatan.index') }}" class="btn btn-secondary">Kembali</a>
</form>

<hr>

{{-- FOTO LAMA --}}
<div class="row mt-4">
@foreach($kegiatan->gambars as $img)
    <div class="col-md-3 text-center mb-3">
        <img src="{{ asset('storage/'.$img->gambar) }}"
             class="img-thumbnail"
             style="height:150px;object-fit:cover">

        <form method="POST"
              action="{{ route('admin.kegiatan.gambar.destroy',$img->id) }}"
              onsubmit="return confirm('Hapus foto?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm mt-2">Hapus</button>
        </form>
    </div>
@endforeach
</div>

@endsection
