<header class="site-header">
    <div class="container site-header__inner">
        <a href="{{ url('/') }}" class="brand">
            <span class="brand__mark" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 8.5 12 4l9 4.5v9L12 22l-9-4.5z" />
                    <path d="M3 8.5 12 13l9-4.5M12 13v9" />
                </svg>
            </span>
            GudangKu
        </a>

        <nav class="site-nav" aria-label="Navigasi utama">
            <a href="{{ url('/') }}">Beranda</a>
            <a href="{{ route('pegawai.index') }}">Data Pegawai</a>
        </nav>

        <div class="header-note">
            <span class="dot" aria-hidden="true"></span>
            Data pegawai
        </div>
    </div>
</header>
