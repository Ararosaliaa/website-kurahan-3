@extends('layouts.app')

@section('title', $kegiatan->judul)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 mx-auto">

            {{-- FOTO UTAMA --}}
            @php
                $foto = $kegiatan->gambars->first();
            @endphp

            <div class="mb-4">
                <img 
                    src="{{ $foto ? asset('storage/'.$foto->gambar) : asset('images/no-image.png') }}"
                    class="img-fluid rounded shadow-sm w-100"
                    style="max-height: 400px; object-fit: cover;"
                    alt="Foto Kegiatan"
                >
            </div>

            {{-- JUDUL --}}
            <h2 class="fw-bold mb-2">
                {{ $kegiatan->judul }}
            </h2>

            {{-- TANGGAL --}}
            <p class="text-muted mb-4">
                {{ \Carbon\Carbon::parse($kegiatan->tanggal)->translatedFormat('d F Y') }}
            </p>

            {{-- DESKRIPSI --}}
            <div class="fs-6 text-secondary" style="line-height: 1.8;">
                {!! nl2br(e($kegiatan->deskripsi)) !!}
            </div>

            {{-- TOMBOL KEMBALI --}}
            <div class="mt-4">
                <a href="{{ route('kegiatan.index') }}" class="btn btn-secondary btn-sm">
                    ← Kembali ke Daftar Kegiatan
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
