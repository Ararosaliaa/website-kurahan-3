@extends('layouts.app')

@section('title','Home')

@section('content')

{{-- ================= HERO ================= --}}
<section class="hero text-center py-5 bg-light">
    <div class="container">
        <h1 class="fw-bold">Selamat Datang di Website Padukuhan Kurahan III</h1>
        <p class="mt-3 text-muted">
            Informasi kegiatan dan berita terbaru seputar Padukuhan Kurahan III
        </p>
    </div>
</section>

{{-- ================= DESKRIPSI SINGKAT ================= --}}
<section class="py-4 bg-white">
    <div class="container text-center">
        <p class="lead text-muted">
            Website Padukuhan Kurahan 3 hadir sebagai media informasi dan komunikasi resmi yang bertujuan untuk meningkatkan transparansi, pelayanan publik, serta partisipasi masyarakat dalam kehidupan bermasyarakat. Melalui website ini, warga dapat mengakses berbagai informasi terkait kegiatan padukuhan, berita terbaru, pengumuman penting, serta dokumentasi aktivitas kemasyarakatan secara mudah, cepat, dan terbuka.
        </p>
    </div>
</section>

<div class="container mt-5">

    {{-- ================= KEGIATAN TERBARU ================= --}}
    <h4 class="mb-3 fw-bold">Kegiatan Terbaru</h4>

    <div class="row">
        @forelse($kegiatan as $item)

        @php
            $foto = $item->gambars->first();
        @endphp

        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm border-0 kegiatan-card">

                <img src="{{ $foto 
                        ? asset('storage/'.$foto->gambar) 
                        : asset('images/no-image.png') }}"
                     class="card-img-top"
                     style="height:200px; object-fit:cover">

                <div class="card-body">
                    <h6 class="fw-semibold">{{ $item->judul }}</h6>
                    <small class="text-muted">
                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                    </small>

                    <div class="mt-3">
                        <a href="{{ route('kegiatan.show',$item->id) }}"
                           class="btn btn-sm btn-primary">
                            Detail
                        </a>
                    </div>
                </div>
            </div>
        </div>

        @empty
        <div class="col-12">
            <p class="text-muted">Belum ada kegiatan.</p>
        </div>
        @endforelse
    </div>

    {{-- ================= BERITA TERBARU ================= --}}
    <h4 class="mb-3 mt-5 fw-bold">Berita Terbaru</h4>

    <div class="row">
        @forelse($berita as $b)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm border-0 kegiatan-card">

                <img src="{{ $b->gambar
                        ? asset('storage/'.$b->gambar)
                        : asset('images/no-image.png') }}"
                     class="card-img-top"
                     style="height:200px; object-fit:cover">

                <div class="card-body">
                    <h6 class="fw-semibold">{{ $b->judul }}</h6>
                    <small class="text-muted">
                        {{ \Carbon\Carbon::parse($b->created_at)->format('d M Y') }}
                    </small>

                    <div class="mt-3">
                        <a href="{{ route('berita.show',$b->id) }}"
                           class="btn btn-sm btn-outline-primary">
                            Baca Berita
                        </a>
                    </div>
                </div>
            </div>
        </div>

        @empty
        <div class="col-12">
            <p class="text-muted">Belum ada berita.</p>
        </div>
        @endforelse
    </div>

</div>

{{-- ================= MAPS LOKASI ================= --}}
<section class="mt-5 py-5 bg-light">
    <div class="container">
        <div class="text-center mb-4">
            <h4 class="fw-bold">Lokasi Padukuhan Kurahan III</h4>
            <p class="text-muted">
                Temukan lokasi Padukuhan Kurahan III melalui peta berikut
            </p>
        </div>

        <div class="ratio ratio-16x9 shadow rounded overflow-hidden">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247.09214979992927!2d110.28799342558887!3d-7.739398321621087!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7af79071748d97%3A0x3282023fa8e2c870!2sDewiSri%20Massage!5e0!3m2!1sen!2sid!4v1769604937124!5m2!1sen!2sid" 
            width="600" 
            height="450" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
        </div>
    </div>
</section>

@endsection

{{-- ================= STYLE TAMBAHAN ================= --}}
@push('styles')
<style>
.kegiatan-card {
    transition: .3s ease;
}
.kegiatan-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 30px rgba(0,0,0,.15);
}
.hero {
    background: linear-gradient(120deg,#f8f9fa,#e9ecef);
}
</style>
@endpush
