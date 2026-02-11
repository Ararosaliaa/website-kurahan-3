@extends('layouts.app')

@section('title','Tentang Kami')

@section('content')

{{-- Hero Section --}}
<div class="bg-light py-5 mb-5 shadow-sm">
    <div class="container text-center">
        <h2 class="fw-bold">Tentang Padukuhan Kurahan 3</h2>
        <p class="text-muted mt-2">
            Mewujudkan wilayah yang harmonis, mandiri, dan berorientasi pada kesejahteraan masyarakat.
        </p>
    </div>
</div>

<div class="container">

    {{-- Profil Desa --}}
    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">Profil Wilayah</h5>
                    <p class="text-muted">
                        Padukuhan Kurahan 3 merupakan salah satu wilayah padukuhan dengan luas ±27 hektar
                        yang memiliki peran penting dalam kehidupan sosial dan pemerintahan desa.
                        Secara geografis berbatasan dengan Kurahan IV dan Japanan (Utara),
                        Kandangan (Selatan), Pendekan (Barat), serta Kandangan dan Japanan (Timur).
                        Letaknya yang strategis menjadikan wilayah ini dinamis dan terus berkembang.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Struktur Pemerintahan --}}
    <div class="row g-4 mb-5">
        <div class="col-md-6">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">Pemerintahan Padukuhan</h5>
                    <ul class="list-unstyled text-muted">
                        <li><strong>Dukuh:</strong> Estu Primaningtyas Wikanthi</li>
                        <li><strong>Ketua LPM:</strong> H. Sudiyo, S.Ag., M.Pd</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">Pembagian Wilayah</h5>
                    <ul class="text-muted">
                        <li><strong>RW 05:</strong> Drs. Padmana
                            <ul>
                                <li>RT 01: Suparjiyo</li>
                                <li>RT 02: Purwadi Sumanto, S.H.</li>
                            </ul>
                        </li>
                        <li><strong>RW 06:</strong> Mujino
                            <ul>
                                <li>RT 03: Sujendro</li>
                                <li>RT 04: Hardiyo</li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- Organisasi --}}
    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">Organisasi Kemasyarakatan</h5>
                    <p class="text-muted">
                        Peran organisasi masyarakat sangat mendukung pembangunan wilayah.
                        PKK dipimpin oleh Dra. Supartinah yang aktif dalam pemberdayaan keluarga
                        dan kesejahteraan masyarakat. Sementara itu, organisasi kepemudaan
                        yang diketuai oleh Mba Deswita menjadi wadah pengembangan potensi
                        dan kreativitas generasi muda.
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
