@extends('layouts.app')

@section('content')
<h2>Daftar Kegiatan</h2>

@foreach($kegiatan as $k)
<div class="card mb-3">
    <div class="card-body">
        <h4>{{ $k->judul }}</h4>
        <p>Tanggal: {{ $k->tanggal }}</p>
        <a href="/kegiatan/{{ $k->id }}" class="btn btn-success btn-sm">
            Detail
        </a>
    </div>
</div>
@endforeach
@endsection
