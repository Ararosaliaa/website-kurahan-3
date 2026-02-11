@extends('layouts.app')

@section('title', $berita->judul)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 mx-auto">

            {{-- FOTO UTAMA --}}
            <div class="mb-4">
                <img 
                    src="{{ $berita->gambar 
                        ? asset('storage/'.$berita->gambar) 
                        : asset('images/no-image.png') }}"
                    class="img-fluid rounded shadow-sm w-100"
                    style="max-height:400px; object-fit:cover;"
                    alt="Foto Berita"
                >
            </div>

            {{-- JUDUL --}}
            <h2 class="fw-bold mb-2">
                {{ $berita->judul }}
            </h2>

            {{-- TANGGAL --}}
            <p class="text-muted mb-4">
                {{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('d F Y') }}
            </p>

            {{-- ISI BERITA --}}
            <div class="fs-6 text-secondary" style="line-height:1.8;">
                {!! nl2br(e($berita->isi)) !!}
            </div>

            {{-- TOMBOL KEMBALI --}}
            <div class="mt-4">
                <a href="{{ route('berita.index') }}" class="btn btn-secondary btn-sm">
                    ← Kembali ke Daftar Berita
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
