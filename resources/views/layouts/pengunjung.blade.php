<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog Kami')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f4f9; font-size: 14px; color: #212529; }
        .navbar-blog { background-color: #2C3E50; }
        .brand-title { font-size: 18px; font-weight: 700; color: #ffffff; margin: 0; line-height: 1.2; }
        .brand-sub { font-size: 11px; color: #aab4c0; margin: 0; }
        .nav-blog a { color: #dfe6ee; font-size: 13px; text-decoration: none; margin-left: 18px; }
        .nav-blog a:hover, .nav-blog a.active { color: #ffffff; font-weight: 600; }
        .btn-login-nav {
            color: #93c5fd; font-size: 13px; text-decoration: none; margin-left: 20px; font-weight: 600;
        }
        .btn-login-nav:hover { color: #ffffff; }
        .container-blog { max-width: 980px; margin: 0 auto; padding: 24px 16px; }
        .footer-blog { background-color: #2C3E50; color: #aab4c0; font-size: 12px; text-align: center; padding: 16px; }
        .badge-kategori {
            background-color: #e0edff; color: #2563eb; font-size: 11px;
            padding: 4px 12px; border-radius: 20px; font-weight: 600; display: inline-block;
        }
        .btn-baca {
            background-color: #1d4ed8; color: #ffffff; font-size: 12px;
            padding: 8px 16px; border-radius: 6px; text-decoration: none; display: inline-block;
        }
        .btn-baca:hover { background-color: #1d4ed8; color: #ffffff; }
        .avatar-init {
            width: 28px; height: 28px; border-radius: 50%; background-color: #2563eb;
            color: #ffffff; display: inline-flex; align-items: center; justify-content: center;
            font-size: 12px; font-weight: 600; flex-shrink: 0;
        }
        .avatar-foto {
            width: 32px; height: 32px; border-radius: 50%; object-fit: cover;
            border: 1px solid #e9ecef; flex-shrink: 0;
        }
        .widget-item {
            display: flex; justify-content: space-between; align-items: center;
            padding: 9px 12px; border-radius: 8px; text-decoration: none;
            color: #444444; font-size: 13px; margin-bottom: 4px;
        }
        .widget-item:hover { background-color: #f4f4f9; color: #222222; }
        .widget-item.active { background-color: #1d4ed8; color: #ffffff; }
        .widget-count {
            background-color: #eef0f3; color: #666666; font-size: 11px;
            border-radius: 12px; padding: 1px 9px; min-width: 26px; text-align: center;
        }
        .widget-item.active .widget-count { background-color: rgba(255,255,255,0.25); color: #ffffff; }
        /* --- sentuhan ringan: rapi, lembut, sedikit playful --- */
        .navbar-blog { background: linear-gradient(135deg, #2C3E50 0%, #34495e 100%); }
        .card {
            border-radius: 16px !important; overflow: hidden;
            transition: transform .18s ease, box-shadow .18s ease;
        }
        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(30, 64, 175, 0.12) !important;
        }
        .card > img { transition: transform .4s ease; }
        .card:hover > img { transform: scale(1.05); }
        .btn-baca { transition: background-color .15s ease, transform .15s ease; }
        .btn-baca:hover { transform: translateX(3px); }
        .widget-item { transition: background-color .15s ease, transform .12s ease; }
        .widget-item:hover { transform: translateX(2px); }
        .avatar-foto { transition: transform .15s ease; }
        .avatar-foto:hover { transform: scale(1.12); }
        .badge-kategori { letter-spacing: .3px; }
    </style>
</head>
<body>
    <div class="navbar-blog">
        <div class="container-blog d-flex justify-content-between align-items-center">
            <div>
                <p class="brand-title">Blog Kami</p>
                <p class="brand-sub">Artikel terbaru seputar teknologi dan pemrograman</p>
            </div>
            <div class="nav-blog">
                <a href="{{ route('beranda') }}" class="{{ request()->routeIs('beranda') ? 'active' : '' }}">Beranda</a>
                <a href="{{ route('beranda') }}">Artikel</a>
                <a href="{{ route('beranda') }}">Kategori</a>
                <a href="#">Tentang</a>
                <a href="{{ route('login') }}" class="btn-login-nav">Login</a>
            </div>
        </div>
    </div>

    <div class="container-blog">
        @yield('content')
    </div>

    <div class="footer-blog">
        &copy; {{ date('Y') }} Blog Kami. Seluruh hak cipta dilindungi.
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
