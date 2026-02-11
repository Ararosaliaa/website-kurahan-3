@extends('layouts.app')

@section('title','Kegiatan')

@section('content')
<div class="container">

    {{-- JUDUL --}}
    <div class="row mb-4">
        <div class="col-lg-10 mx-auto">
            <h3 class="fw-bold text-start">
                Daftar Kegiatan
            </h3>
        </div>
    </div>

    {{-- LIST KEGIATAN --}}
    <div class="row">
        <div class="col-lg-10 mx-auto">

            @forelse($kegiatan as $k)
            @php
                $foto = $k->gambars->first();
            @endphp

            <div class="card mb-3 shadow-sm border-0">
                <div class="row g-0 align-items-center">

                    {{-- FOTO --}}
                    <div class="col-md-3">
                        <img 
                            src="{{ $foto ? asset('storage/'.$foto->gambar) : asset('images/no-image.png') }}"
                            class="img-fluid rounded-start"
                            style="height:160px; width:100%; object-fit:cover"
                            alt="Foto Kegiatan"
                        >
                    </div>

                    {{-- ISI --}}
                    <div class="col-md-9">
                        <div class="card-body">

                            <h5 class="fw-semibold mb-1">
                                {{ $k->judul }}
                            </h5>

                            <small class="text-muted d-block mb-2">
                                {{ \Carbon\Carbon::parse($k->tanggal)->translatedFormat('d F Y') }}
                            </small>

                            <p class="text-muted mb-3">
                                {{ \Illuminate\Support\Str::limit(strip_tags($k->deskripsi), 120) }}
                            </p>

                            <a href="{{ route('kegiatan.show',$k->id) }}"
                               class="btn btn-outline-primary btn-sm">
                                Lihat Detail
                            </a>

                        </div>
                    </div>

                </div>
            </div>

            @empty
                <p class="text-muted">Belum ada kegiatan.</p>
            @endforelse

        </div>
    </div>

</div>
@endsection
