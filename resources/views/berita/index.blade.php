@extends('layouts.app')

@section('title','Berita')

@section('content')
<div class="container">

    {{-- JUDUL --}}
    <div class="row mb-4">
        <div class="col-lg-10 mx-auto">
            <h3 class="fw-bold">Berita Desa</h3>
            <p class="text-muted mb-0">
                Informasi dan berita terbaru seputar Padukuhan Kurahan III
            </p>
        </div>
    </div>

    {{-- LIST BERITA --}}
    <div class="row">
        <div class="col-lg-10 mx-auto">

            @forelse($berita as $b)
            <div class="card mb-3 shadow-sm border-0">
                <div class="row g-0 align-items-center">

                    {{-- FOTO --}}
                    <div class="col-md-3">
                        <img 
                            src="{{ $b->gambar 
                                    ? asset('storage/'.$b->gambar) 
                                    : asset('images/no-image.png') }}"
                            class="img-fluid rounded-start"
                            style="height:160px; width:100%; object-fit:cover"
                            alt="Foto Berita"
                        >
                    </div>

                    {{-- KONTEN --}}
                    <div class="col-md-9">
                        <div class="card-body">

                            <h5 class="fw-semibold mb-1">
                                {{ $b->judul }}
                            </h5>

                            <small class="text-muted d-block mb-2">
                                {{ \Carbon\Carbon::parse($b->created_at)->format('d M Y') }}
                            </small>

                            <p class="text-muted mb-3">
                                {{ Str::limit(strip_tags($b->isi), 150) }}
                            </p>

                            <a href="{{ route('berita.show',$b->id) }}"
                               class="btn btn-outline-primary btn-sm">
                                Baca Berita
                            </a>

                        </div>
                    </div>

                </div>
            </div>
            @empty
                <p class="text-muted">Belum ada berita.</p>
            @endforelse

            {{-- PAGINATION --}}
            <div class="mt-4">
                {{ $berita->links() }}
            </div>

        </div>
    </div>

</div>
@endsection
