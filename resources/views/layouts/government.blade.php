<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - Instansi Pemerintahan</title>
    <style>
        :root {
            --primary: #475569; /* Tema warna abu-abu kebiruan untuk pemerintah */
            --primary-dark: #334155;
            --bg: #F8FAFC;
            --border: #E2E8F0;
            --text: #0F172A;
            --muted: #64748B;
        }
        * { box-sizing: border-box; }
        body { margin: 0; font-family: 'Instrument Sans', system-ui, sans-serif; background: var(--bg); color: var(--text); line-height: 1.5; }
        a { color: var(--primary); text-decoration: none; }
        
        .container { width: 100%; max-width: 1100px; margin: 0 auto; padding: 0 16px; }
        .main { padding-top: 24px; padding-bottom: 48px; }

        /* Navbar khusus Pemerintahan */
        .navbar { background: #fff; border-bottom: 1px solid var(--border); }
        .nav-inner { display: flex; align-items: center; justify-content: space-between; height: 64px; }
        .brand { font-size: 20px; font-weight: 700; color: var(--primary); }
        .brand-tag { margin-left: 8px; font-size: 11px; font-weight: 700; background: #E2E8F0; padding: 2px 6px; border-radius: 4px; }
        .nav-links { display: flex; align-items: center; gap: 16px; }
        .nav-links form { margin: 0; }
        .nav-user { color: var(--muted); font-size: 14px; font-weight: 500; }

        /* Layout Grid Dashboard */
        .dashboard-layout { display: grid; grid-template-columns: 220px minmax(0, 1fr); gap: 20px; align-items: start; }
        .dashboard-sidebar { padding: 16px; background: #fff; border: 1px solid var(--border); border-radius: 8px; }
        .dashboard-role { margin: 0 0 12px; color: var(--muted); font-size: 12px; font-weight: 700; text-transform: uppercase; }
        .dashboard-nav-link { display: block; padding: 10px 12px; border-radius: 6px; background: #F1F5F9; color: var(--primary); font-weight: 600; }
        .dashboard-content { min-width: 0; }

        /* Komponen */
        .card { background: #fff; border: 1px solid var(--border); border-radius: 12px; padding: 24px; box-shadow: 0 1px 2px rgba(15, 23, 42, .05); }
        h1 { font-size: 24px; margin: 0 0 4px; }
        .subtitle { color: var(--muted); margin: 0 0 20px; }
        
        .btn { display: inline-block; border: 1px solid transparent; border-radius: 8px; padding: 10px 18px; font-weight: 600; cursor: pointer; text-align: center; }
        .btn-outline { background: #fff; color: var(--text); border-color: var(--border); }
        .btn-sm { padding: 6px 14px; font-size: 14px; }

        .alert-success { background: #DCFCE7; color: #166534; padding: 12px 16px; border-radius: 8px; margin-bottom: 16px; font-size: 14px; }
    </style>
</head>
<body>
    <header class="navbar">
        <div class="container nav-inner">
            <div class="brand">CariKerja <span class="brand-tag">Pemerintahan</span></div>
            <nav class="nav-links">
                <span class="nav-user">{{ Auth::user()->name ?? 'Pengguna' }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline btn-sm">Keluar</button>
                </form>
            </nav>
        </div>
    </header>

    <main class="container main">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Area ini akan diisi oleh file dashboard -->
        @yield('content') 
    </main>
</body>
</html>