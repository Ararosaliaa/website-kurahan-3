@extends('layouts.app')

@section('content')
<h2>{{ $berita->judul }}</h2>
<p>{{ $berita->isi }}</p>

<a href="/berita" class="btn btn-secondary btn-sm">Kembali</a>
@endsection
