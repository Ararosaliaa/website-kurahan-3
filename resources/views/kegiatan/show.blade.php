@extends('layouts.app')

@section('content')
<h2>{{ $kegiatan->judul }}</h2>
<p><strong>Tanggal:</strong> {{ $kegiatan->tanggal }}</p>
<p>{{ $kegiatan->deskripsi }}</p>

<a href="/kegiatan" class="btn btn-secondary btn-sm">Kembali</a>
@endsection
