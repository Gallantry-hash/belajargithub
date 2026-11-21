<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'GudangKu')</title>

        <style>
            :root {
                --ink: #0b1526;
                --ink-soft: #33405a;
                --muted: #64748b;
                --line: rgba(11, 21, 38, 0.1);
                --surface: #ffffff;
                --canvas: #f6f8fc;
                --brand: #1d4ed8;
                --brand-strong: #1e40af;
                --success: #15803d;
                --danger: #b91c1c;
                --radius-lg: 22px;
                --radius-md: 14px;
                --shadow-sm: 0 1px 2px rgba(11, 21, 38, 0.06);
                --shadow-lg: 0 30px 60px -32px rgba(11, 21, 38, 0.35);
                --font: "Instrument Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            }

            *,
            *::before,
            *::after {
                box-sizing: border-box;
            }

            body {
                margin: 0;
                font-family: var(--font);
                color: var(--ink);
                background-color: var(--canvas);
                background-image:
                    radial-gradient(900px 420px at 88% -8%, rgba(245, 158, 11, 0.12), transparent 70%),
                    radial-gradient(760px 420px at 4% 0%, rgba(29, 78, 216, 0.1), transparent 68%);
                line-height: 1.6;
                -webkit-font-smoothing: antialiased;
            }

            a {
                color: inherit;
            }

            .container {
                width: 100%;
                max-width: 1040px;
                margin: 0 auto;
                padding: 0 24px;
            }

            .site-header {
                position: sticky;
                top: 0;
                z-index: 40;
                background: rgba(246, 248, 252, 0.85);
                backdrop-filter: blur(14px);
                -webkit-backdrop-filter: blur(14px);
                border-bottom: 1px solid var(--line);
            }

            .site-header__inner {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 24px;
                min-height: 72px;
            }

            .brand {
                display: inline-flex;
                align-items: center;
                gap: 10px;
                font-weight: 700;
                font-size: 1.125rem;
                letter-spacing: -0.01em;
                color: var(--ink);
                text-decoration: none;
            }

            .brand__mark {
                display: grid;
                place-items: center;
                width: 38px;
                height: 38px;
                border-radius: 11px;
                background: linear-gradient(150deg, #1d4ed8, #0b2a6b);
                color: #fff;
                box-shadow: 0 8px 18px -10px rgba(29, 78, 216, 0.9);
            }

            .brand__mark svg {
                width: 20px;
                height: 20px;
            }

            .site-nav {
                display: flex;
                align-items: center;
                gap: 22px;
                font-size: 0.9375rem;
                font-weight: 600;
            }

            .site-nav a {
                color: var(--ink-soft);
                text-decoration: none;
                transition: color 0.18s ease;
            }

            .site-nav a:hover {
                color: var(--brand);
            }

            .site-nav .nav-cta {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                padding: 10px 16px;
                border-radius: 11px;
                background: var(--brand);
                color: #fff;
                box-shadow: 0 10px 20px -12px rgba(29, 78, 216, 0.9);
            }

            .site-nav .nav-cta:hover {
                background: var(--brand-strong);
                color: #fff;
            }

            .page {
                padding: 52px 0 72px;
                min-height: calc(100vh - 160px);
            }

            .page-head {
                display: flex;
                flex-wrap: wrap;
                align-items: flex-end;
                justify-content: space-between;
                gap: 20px;
                margin-bottom: 28px;
            }

            .page-head h1 {
                margin: 0 0 6px;
                font-size: clamp(1.75rem, 3vw, 2.25rem);
                line-height: 1.15;
                letter-spacing: -0.03em;
            }

            .page-head p {
                margin: 0;
                color: var(--muted);
            }

            .back-link {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                margin-bottom: 16px;
                color: var(--muted);
                font-size: 0.875rem;
                font-weight: 600;
                text-decoration: none;
            }

            .back-link:hover {
                color: var(--brand);
            }

            .btn {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 9px;
                padding: 12px 20px;
                border-radius: 12px;
                border: 1px solid transparent;
                font-family: inherit;
                font-size: 0.9375rem;
                font-weight: 600;
                line-height: 1.2;
                cursor: pointer;
                text-decoration: none;
                transition: transform 0.16s ease, box-shadow 0.16s ease, background 0.16s ease, border-color 0.16s ease;
            }

            .btn svg {
                width: 17px;
                height: 17px;
                flex: none;
            }

            .btn:focus-visible,
            .field input:focus-visible {
                outline: 3px solid rgba(29, 78, 216, 0.28);
                outline-offset: 2px;
            }

            .btn--primary {
                background: linear-gradient(180deg, #2563eb, #1d4ed8);
                color: #fff;
                box-shadow: 0 14px 26px -16px rgba(29, 78, 216, 0.95);
            }

            .btn--primary:hover {
                transform: translateY(-1px);
                background: linear-gradient(180deg, #1d4ed8, #1e40af);
            }

            .btn--secondary {
                background: var(--surface);
                color: var(--ink);
                border-color: rgba(11, 21, 38, 0.14);
                box-shadow: var(--shadow-sm);
            }

            .btn--secondary:hover {
                border-color: rgba(11, 21, 38, 0.26);
                background: #fbfcfe;
            }

            .card {
                background: var(--surface);
                border: 1px solid var(--line);
                border-radius: var(--radius-lg);
                box-shadow: var(--shadow-lg);
            }

            .form-card {
                padding: 30px;
            }

            .form-grid {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 22px;
            }

            .field {
                display: grid;
                gap: 7px;
            }

            .field--full {
                grid-column: 1 / -1;
            }

            .field label {
                font-size: 0.875rem;
                font-weight: 600;
                color: var(--ink-soft);
            }

            .field .hint {
                font-size: 0.8125rem;
                color: var(--muted);
            }

            .field input {
                width: 100%;
                padding: 12px 14px;
                border: 1px solid rgba(11, 21, 38, 0.16);
                border-radius: 11px;
                background: #fff;
                color: var(--ink);
                font-family: inherit;
                font-size: 0.9375rem;
                transition: border-color 0.16s ease, box-shadow 0.16s ease;
            }

            .field input:hover {
                border-color: rgba(11, 21, 38, 0.28);
            }

            .field input:focus {
                border-color: var(--brand);
                box-shadow: 0 0 0 3px rgba(29, 78, 216, 0.1);
                outline: none;
            }

            .field input.is-invalid {
                border-color: rgba(185, 28, 28, 0.65);
            }

            .field input.is-invalid:focus {
                box-shadow: 0 0 0 3px rgba(185, 28, 28, 0.1);
            }

            .field .error {
                margin: 0;
                color: var(--danger);
                font-size: 0.8125rem;
                font-weight: 500;
            }

            .form-actions {
                display: flex;
                flex-wrap: wrap;
                gap: 12px;
                margin-top: 30px;
                padding-top: 24px;
                border-top: 1px solid var(--line);
            }

            .alert {
                display: flex;
                align-items: center;
                gap: 10px;
                margin-bottom: 22px;
                padding: 13px 16px;
                border: 1px solid rgba(21, 128, 61, 0.22);
                border-radius: 12px;
                background: #f0fdf4;
                color: #166534;
                font-size: 0.9375rem;
                font-weight: 500;
            }

            .alert svg {
                width: 18px;
                height: 18px;
                flex: none;
            }

            .table-card {
                overflow: hidden;
            }

            .table-wrap {
                overflow-x: auto;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                font-size: 0.9375rem;
            }

            th {
                padding: 14px 20px;
                background: #f8fafc;
                border-bottom: 1px solid var(--line);
                color: var(--muted);
                font-size: 0.75rem;
                font-weight: 700;
                letter-spacing: 0.06em;
                text-align: left;
                text-transform: uppercase;
                white-space: nowrap;
            }

            td {
                padding: 15px 20px;
                border-bottom: 1px solid rgba(11, 21, 38, 0.06);
                vertical-align: middle;
            }

            tbody tr:last-child td {
                border-bottom: 0;
            }

            tbody tr:hover {
                background: #fbfcff;
            }

            .item-name {
                display: block;
                font-weight: 600;
                color: var(--ink);
            }

            .item-meta {
                display: block;
                margin-top: 2px;
                color: var(--muted);
                font-size: 0.8125rem;
            }

            .stock {
                font-weight: 600;
                color: var(--ink-soft);
                white-space: nowrap;
            }

            .chip {
                display: inline-block;
                padding: 4px 10px;
                border-radius: 999px;
                font-size: 0.75rem;
                font-weight: 600;
                white-space: nowrap;
            }

            .chip--ok {
                background: #e7f8ee;
                color: var(--success);
            }

            .chip--low {
                background: #fff3d9;
                color: #b45309;
            }

            .empty-state {
                padding: 56px 24px;
                text-align: center;
            }

            .empty-state__icon {
                display: grid;
                place-items: center;
                width: 56px;
                height: 56px;
                margin: 0 auto 16px;
                border-radius: 16px;
                background: rgba(29, 78, 216, 0.08);
                color: var(--brand);
            }

            .empty-state__icon svg {
                width: 26px;
                height: 26px;
            }

            .empty-state h2 {
                margin: 0 0 6px;
                font-size: 1.0625rem;
            }

            .empty-state p {
                margin: 0 0 20px;
                color: var(--muted);
                font-size: 0.9375rem;
            }

            .pagination {
                display: flex;
                flex-wrap: wrap;
                align-items: center;
                justify-content: space-between;
                gap: 12px;
                padding: 16px 20px;
                border-top: 1px solid var(--line);
                color: var(--muted);
                font-size: 0.875rem;
            }

            .pagination__links {
                display: flex;
                gap: 8px;
            }

            .pagination a,
            .pagination span.page-link {
                display: inline-block;
                padding: 7px 12px;
                border: 1px solid var(--line);
                border-radius: 9px;
                background: #fff;
                color: var(--ink-soft);
                font-weight: 600;
                text-decoration: none;
            }

            .pagination a:hover {
                border-color: rgba(29, 78, 216, 0.35);
                color: var(--brand);
            }

            .pagination .is-disabled {
                opacity: 0.45;
            }

            .site-footer {
                padding: 26px 0 32px;
                border-top: 1px solid var(--line);
                color: var(--muted);
                font-size: 0.8125rem;
            }

            .site-footer__inner {
                display: flex;
                flex-wrap: wrap;
                align-items: center;
                justify-content: space-between;
                gap: 12px;
            }

            @media (max-width: 700px) {
                .site-nav > a:first-child {
                    display: none;
                }

                .site-header__inner {
                    min-height: 64px;
                }

                .page {
                    padding-top: 36px;
                }

                .form-card {
                    padding: 22px;
                }

                .form-grid {
                    grid-template-columns: 1fr;
                }

                .form-actions .btn {
                    width: 100%;
                }
            }
        </style>
    </head>
    <body>
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
                    <a href="{{ route('barang.index') }}">Daftar Barang</a>
                    <a href="{{ route('barang.create') }}" class="nav-cta">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M12 5v14M5 12h14" />
                        </svg>
                        Tambah Barang
                    </a>
                </nav>
            </div>
        </header>

        <main class="page">
            <div class="container">
                @yield('content')
            </div>
        </main>

        <footer class="site-footer">
            <div class="container site-footer__inner">
                <span>&copy; {{ date('Y') }} GudangKu — Sistem pendataan barang gudang.</span>
                <span>Dibuat untuk tim gudang yang ingin kerja lebih rapi.</span>
            </div>
        </footer>
    </body>
</html>
