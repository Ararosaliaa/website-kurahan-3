<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background: #f5f6fa; }
        .sidebar {
            width: 250px;
            background: #1f2937;
            min-height: 100vh;
        }
        .sidebar a {
            color: #cbd5e1;
            text-decoration: none;
            padding: 12px 20px;
            display: block;
        }
        .sidebar a:hover,
        .sidebar a.active {
            background: #111827;
            color: #fff;
        }
        .sidebar h6 {
            color: #9ca3af;
            padding: 10px 20px;
            text-transform: uppercase;
            font-size: 12px;
        }
        .sidebar-logout {
        width: 100%;
        background: transparent;
        border: none;
        color: #f87171;
        padding: 12px 20px;
        text-align: left;
        }

        .sidebar-logout:hover {
        background: #111827;
        color: #ef4444;
        }

    </style>
</head>
<body>

<div class="d-flex">

    {{-- SIDEBAR --}}
    <aside class="sidebar d-flex flex-column">
    <div class="p-3 text-white fw-bold fs-5 border-bottom">
        Admin Desa
        <div class="small text-secondary">Administrator</div>
    </div>

    <div class="flex-grow-1">
        <h6>Dashboard</h6>
        <a href="/admin" class="{{ request()->is('admin') ? 'active' : '' }}">
            📊 Dashboard
        </a>

        <h6>Konten</h6>
        <a href="/admin/berita" class="{{ request()->is('admin/berita*') ? 'active' : '' }}">
            📰 Berita
        </a>
        <a href="/admin/kegiatan" class="{{ request()->is('admin/kegiatan*') ? 'active' : '' }}">
            📅 Kegiatan
        </a>

        <h6>Akun</h6>
        <a href="/" target="_blank">
            🌍 Lihat Website
        </a>
    </div>

    {{-- LOGOUT --}}
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="sidebar-logout">
            🚪 Logout
        </button>
    </form>
</aside>


    {{-- MAIN --}}
    <main class="flex-fill p-4">
        <div class="bg-white p-4 rounded shadow-sm">
            <h4 class="mb-3">@yield('title')</h4>
            @yield('content')
        </div>
    </main>

</div>

</body>
</html>
