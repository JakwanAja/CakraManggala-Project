{{-- File: resources/views/layouts/dashboard.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Admin</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        :root {
            --primary: #1a4331;
            --secondary: #255b44;
            --bg: #f4f7f6;
            --sidebar-w: 240px;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: #333;
        }

        /* Sidebar */
        .sidebar {
            width: var(--sidebar-w);
            height: 100vh;
            position: fixed;
            background: var(--primary);
            color: white;
            transition: 0.3s;
            z-index: 1000;
        }

        .sidebar-brand {
            padding: 1.5rem;
            font-weight: 800;
            font-size: 1.2rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-link {
            color: rgba(255,255,255,0.7);
            padding: 0.8rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            transition: 0.2s;
        }

        .nav-link:hover, .nav-link.active {
            color: white;
            background: rgba(255,255,255,0.1);
        }

        .nav-link.active {
            border-left: 4px solid #f2b661;
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-w);
            padding: 2rem;
            transition: 0.3s;
        }

        .card { border-radius: 12px; }

        @media (max-width: 992px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.show { transform: translateX(0); }
            .main-content { margin-left: 0; }
            .mobile-header { display: flex !important; }
        }

        .mobile-header {
            display: none;
            background: white;
            padding: 1rem;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        .btn-toggle {
            background: none;
            border: none;
            font-size: 1.5rem;
        }

        .user-footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            padding: 1rem;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        .logout-btn {
            background: rgba(255,255,255,0.1);
            color: white;
            border: none;
            width: 100%;
            padding: 0.5rem;
            border-radius: 6px;
            font-size: 0.8rem;
        }
    </style>
</head>
<body>
    <div class="mobile-header">
        <span class="fw-bold">Admin Panel</span>
        <button class="btn-toggle" onclick="toggleSidebar()"><i class="bi bi-list"></i></button>
    </div>

    <div class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <img src="{{ asset('image/logo.png') }}" width="30">
            <span>Cakra Manggala</span>
        </div>
        
        <nav class="mt-3">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
            <a href="{{ route('dashboard.pendaftar') }}" class="nav-link {{ request()->routeIs('dashboard.pendaftar*') ? 'active' : '' }}">
                <i class="bi bi-people"></i> Pendaftar
            </a>
            <a href="{{ route('dashboard.artikel.index') }}" class="nav-link {{ request()->routeIs('dashboard.artikel*') ? 'active' : '' }}">
                <i class="bi bi-journal-text"></i> Artikel
            </a>
            <a href="{{ route('dashboard.kegiatan.index') }}" class="nav-link {{ request()->routeIs('dashboard.kegiatan*') ? 'active' : '' }}">
                <i class="bi bi-calendar-event"></i> Kegiatan
            </a>
            <a href="{{ route('dashboard.pesan') }}" class="nav-link {{ request()->routeIs('dashboard.pesan*') ? 'active' : '' }}">
                <i class="bi bi-chat-dots"></i> Pesan
            </a>
        </nav>

        <div class="user-footer">
            <div class="small mb-2 opacity-75 text-center">{{ Auth::user()->name }}</div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="bi bi-box-arrow-right"></i> Keluar
                </button>
            </form>
        </div>
    </div>

    <main class="main-content">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4 small py-2">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('show');
        }
    </script>
    @stack('scripts')
</body>
</html>
