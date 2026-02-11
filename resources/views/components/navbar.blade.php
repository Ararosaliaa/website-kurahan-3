<nav class="navbar navbar-expand-lg navbar-dark shadow-sm custom-navbar">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            Padukuhan Kurahan III
        </a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="nav" class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="/kegiatan">Kegiatan</a></li>
                <li class="nav-item"><a class="nav-link" href="/berita">Berita</a></li>
            </ul>
        </div>
    </div>
</nav>
<style>
.custom-navbar {
    background: linear-gradient(90deg, #1b5e20, #2e7d32);
}

.custom-navbar .nav-link {
    color: rgba(255,255,255,.85) !important;
    transition: .3s;
}

.custom-navbar .nav-link:hover {
    color: #fff !important;
    text-decoration: underline;
}

.custom-navbar .navbar-brand {
    color: #fff !important;
}
</style>
