<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GudangKu — Sistem Pendataan Barang Gudang</title>
        <meta name="description" content="GudangKu membantu tim gudang mencatat barang masuk dan keluar, memantau stok, serta mengelola data pegawai dalam satu tempat.">

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
                --amber: #f59e0b;
                --success: #15803d;
                --radius-lg: 22px;
                --radius-md: 14px;
                --shadow-sm: 0 1px 2px rgba(11, 21, 38, 0.06);
                --shadow-lg: 0 30px 60px -32px rgba(11, 21, 38, 0.45);
                --font: "Instrument Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            }

            *,
            *::before,
            *::after {
                box-sizing: border-box;
            }

            html {
                scroll-behavior: smooth;
            }

            body {
                margin: 0;
                font-family: var(--font);
                color: var(--ink);
                background-color: var(--canvas);
                background-image:
                    radial-gradient(900px 420px at 88% -8%, rgba(245, 158, 11, 0.16), transparent 70%),
                    radial-gradient(760px 420px at 4% 0%, rgba(29, 78, 216, 0.12), transparent 68%);
                line-height: 1.6;
                -webkit-font-smoothing: antialiased;
            }

            .container {
                width: 100%;
                max-width: 1140px;
                margin: 0 auto;
                padding: 0 24px;
            }

            /* ---------- Header ---------- */

            .site-header {
                position: sticky;
                top: 0;
                z-index: 40;
                background: rgba(246, 248, 252, 0.82);
                backdrop-filter: blur(14px);
                -webkit-backdrop-filter: blur(14px);
                border-bottom: 1px solid var(--line);
            }

            .site-header__inner {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 24px;
                height: 72px;
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
                gap: 30px;
                font-size: 0.9375rem;
                font-weight: 500;
            }

            .site-nav a {
                color: var(--ink-soft);
                text-decoration: none;
                transition: color 0.18s ease;
            }

            .site-nav a:hover {
                color: var(--brand);
            }

            .header-note {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                padding: 7px 14px;
                border: 1px solid var(--line);
                border-radius: 999px;
                background: rgba(255, 255, 255, 0.7);
                font-size: 0.8125rem;
                font-weight: 600;
                color: var(--ink-soft);
                white-space: nowrap;
            }

            .header-note .dot {
                width: 8px;
                height: 8px;
                border-radius: 50%;
                background: #16a34a;
                box-shadow: 0 0 0 4px rgba(22, 163, 74, 0.15);
            }

            /* ---------- Hero ---------- */

            .hero {
                padding: 68px 0 76px;
            }

            .hero__grid {
                display: grid;
                grid-template-columns: 1.05fr 0.95fr;
                align-items: center;
                gap: 56px;
            }

            .eyebrow {
                display: inline-flex;
                align-items: center;
                gap: 9px;
                padding: 7px 14px 7px 9px;
                border-radius: 999px;
                background: rgba(29, 78, 216, 0.08);
                border: 1px solid rgba(29, 78, 216, 0.16);
                color: var(--brand-strong);
                font-size: 0.8125rem;
                font-weight: 600;
                letter-spacing: 0.01em;
            }

            .eyebrow span.badge {
                padding: 2px 8px;
                border-radius: 999px;
                background: var(--brand);
                color: #fff;
                font-size: 0.6875rem;
                letter-spacing: 0.04em;
                text-transform: uppercase;
            }

            .hero h1 {
                margin: 22px 0 18px;
                font-size: clamp(2.25rem, 4.6vw, 3.5rem);
                line-height: 1.08;
                letter-spacing: -0.035em;
                font-weight: 700;
            }

            .hero h1 .highlight {
                position: relative;
                color: var(--brand-strong);
                white-space: nowrap;
            }

            .hero h1 .highlight::after {
                content: "";
                position: absolute;
                left: 2px;
                right: 2px;
                bottom: 0.06em;
                height: 0.28em;
                border-radius: 3px;
                background: rgba(245, 158, 11, 0.38);
                z-index: -1;
            }

            .hero__lead {
                margin: 0;
                max-width: 34rem;
                font-size: 1.0625rem;
                color: var(--muted);
            }

            .hero__actions {
                display: flex;
                flex-wrap: wrap;
                gap: 14px;
                margin-top: 30px;
            }

            .btn {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 10px;
                padding: 15px 24px;
                border-radius: var(--radius-md);
                border: 1px solid transparent;
                font-family: inherit;
                font-size: 1rem;
                font-weight: 600;
                line-height: 1.2;
                cursor: pointer;
                text-decoration: none;
                transition: transform 0.16s ease, box-shadow 0.16s ease, background 0.16s ease, border-color 0.16s ease;
            }

            .btn svg {
                width: 18px;
                height: 18px;
                flex: none;
            }

            .btn:focus-visible {
                outline: 3px solid rgba(29, 78, 216, 0.35);
                outline-offset: 3px;
            }

            .btn--primary {
                background: linear-gradient(180deg, #2563eb, #1d4ed8);
                color: #fff;
                box-shadow: 0 14px 26px -14px rgba(29, 78, 216, 0.95), inset 0 1px 0 rgba(255, 255, 255, 0.18);
            }

            .btn--primary:hover {
                transform: translateY(-2px);
                box-shadow: 0 20px 32px -16px rgba(29, 78, 216, 0.95), inset 0 1px 0 rgba(255, 255, 255, 0.22);
            }

            .btn--secondary {
                background: var(--surface);
                color: var(--ink);
                border-color: rgba(11, 21, 38, 0.14);
                box-shadow: var(--shadow-sm);
            }

            .btn--secondary:hover {
                transform: translateY(-2px);
                border-color: rgba(11, 21, 38, 0.26);
                background: #fbfcfe;
                box-shadow: 0 14px 24px -18px rgba(11, 21, 38, 0.6);
            }

            .btn:active {
                transform: translateY(0);
            }

            .hero__meta {
                display: flex;
                flex-wrap: wrap;
                gap: 18px;
                margin-top: 26px;
                padding: 0;
                list-style: none;
                font-size: 0.875rem;
                color: var(--muted);
            }

            .hero__meta li {
                display: inline-flex;
                align-items: center;
                gap: 7px;
            }

            .hero__meta svg {
                width: 15px;
                height: 15px;
                color: #16a34a;
                flex: none;
            }

            /* ---------- Mock dashboard ---------- */

            .preview {
                position: relative;
            }

            .preview__glow {
                position: absolute;
                inset: 8% 4% 6%;
                border-radius: 32px;
                background: linear-gradient(150deg, rgba(29, 78, 216, 0.22), rgba(245, 158, 11, 0.18));
                filter: blur(34px);
                z-index: 0;
            }

            .card {
                position: relative;
                z-index: 1;
                background: var(--surface);
                border: 1px solid var(--line);
                border-radius: var(--radius-lg);
                box-shadow: var(--shadow-lg);
                overflow: hidden;
            }

            .card__bar {
                display: flex;
                align-items: center;
                gap: 7px;
                padding: 14px 18px;
                background: #f8fafc;
                border-bottom: 1px solid var(--line);
            }

            .card__bar .dot {
                width: 10px;
                height: 10px;
                border-radius: 50%;
                background: #dbe2ee;
            }

            .card__bar .dot:first-child {
                background: #fda4af;
            }

            .card__bar .dot:nth-child(2) {
                background: #fcd34d;
            }

            .card__bar .dot:nth-child(3) {
                background: #86efac;
            }

            .card__bar .url {
                margin-left: 10px;
                padding: 4px 12px;
                border-radius: 999px;
                background: #eef2f9;
                color: var(--muted);
                font-size: 0.75rem;
            }

            .card__body {
                padding: 20px 20px 8px;
            }

            .card__head {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 12px;
                margin-bottom: 16px;
            }

            .card__head h2 {
                margin: 0;
                font-size: 1rem;
                letter-spacing: -0.01em;
            }

            .card__head span {
                font-size: 0.75rem;
                color: var(--muted);
            }

            .rows {
                display: grid;
                gap: 8px;
                margin: 0;
                padding: 0;
                list-style: none;
            }

            .row {
                display: grid;
                grid-template-columns: 1fr auto auto;
                align-items: center;
                gap: 12px;
                padding: 11px 12px;
                border-radius: 12px;
                background: #f9fbfe;
                border: 1px solid rgba(11, 21, 38, 0.05);
            }

            .row__item {
                display: flex;
                align-items: center;
                gap: 10px;
                min-width: 0;
            }

            .row__icon {
                display: grid;
                place-items: center;
                width: 32px;
                height: 32px;
                flex: none;
                border-radius: 9px;
                background: #e8eeff;
                color: var(--brand);
            }

            .row__icon svg {
                width: 16px;
                height: 16px;
            }

            .row__name {
                display: block;
                font-size: 0.8125rem;
                font-weight: 600;
                color: var(--ink);
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .row__cat {
                display: block;
                font-size: 0.6875rem;
                color: var(--muted);
            }

            .row__qty {
                font-size: 0.75rem;
                font-weight: 600;
                color: var(--ink-soft);
                white-space: nowrap;
            }

            .chip {
                padding: 3px 9px;
                border-radius: 999px;
                font-size: 0.6875rem;
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

            .card__foot {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 12px;
                padding: 16px 20px 20px;
                font-size: 0.75rem;
                color: var(--muted);
            }

            .card__foot .progress {
                flex: 1;
                height: 7px;
                border-radius: 999px;
                background: #eef2f9;
                overflow: hidden;
                max-width: 150px;
            }

            .card__foot .progress span {
                display: block;
                width: 72%;
                height: 100%;
                border-radius: inherit;
                background: linear-gradient(90deg, #2563eb, #60a5fa);
            }

            .floating {
                position: absolute;
                z-index: 2;
                display: flex;
                align-items: center;
                gap: 11px;
                padding: 12px 16px 12px 12px;
                border-radius: var(--radius-md);
                background: #fff;
                border: 1px solid var(--line);
                box-shadow: 0 18px 34px -22px rgba(11, 21, 38, 0.65);
                font-size: 0.8125rem;
                font-weight: 600;
            }

            .floating--saved {
                right: -18px;
                bottom: 28px;
            }

            .floating__icon {
                display: grid;
                place-items: center;
                width: 32px;
                height: 32px;
                flex: none;
                border-radius: 50%;
                background: #e7f8ee;
                color: var(--success);
            }

            .floating__icon svg {
                width: 16px;
                height: 16px;
            }

            .floating small {
                display: block;
                font-size: 0.6875rem;
                font-weight: 500;
                color: var(--muted);
            }

            /* ---------- Sections ---------- */

            .section {
                padding: 72px 0;
            }

            .section--tight {
                padding-top: 0;
            }

            .section__head {
                max-width: 620px;
                margin-bottom: 40px;
            }

            .section__label {
                display: inline-block;
                margin-bottom: 10px;
                font-size: 0.75rem;
                font-weight: 700;
                letter-spacing: 0.12em;
                text-transform: uppercase;
                color: var(--brand);
            }

            .section__head h2 {
                margin: 0 0 12px;
                font-size: clamp(1.6rem, 2.6vw, 2.125rem);
                line-height: 1.2;
                letter-spacing: -0.025em;
            }

            .section__head p {
                margin: 0;
                color: var(--muted);
                font-size: 1rem;
            }

            .cards {
                display: grid;
                grid-template-columns: repeat(4, minmax(0, 1fr));
                gap: 20px;
            }

            .feature {
                padding: 24px;
                border-radius: var(--radius-lg);
                background: var(--surface);
                border: 1px solid var(--line);
                box-shadow: var(--shadow-sm);
                transition: transform 0.18s ease, box-shadow 0.18s ease, border-color 0.18s ease;
            }

            .feature:hover {
                transform: translateY(-4px);
                border-color: rgba(29, 78, 216, 0.28);
                box-shadow: 0 22px 34px -26px rgba(11, 21, 38, 0.7);
            }

            .feature__icon {
                display: grid;
                place-items: center;
                width: 44px;
                height: 44px;
                margin-bottom: 18px;
                border-radius: 12px;
                background: linear-gradient(150deg, rgba(29, 78, 216, 0.14), rgba(29, 78, 216, 0.06));
                color: var(--brand-strong);
            }

            .feature__icon svg {
                width: 22px;
                height: 22px;
            }

            .feature h3 {
                margin: 0 0 8px;
                font-size: 1rem;
                letter-spacing: -0.01em;
            }

            .feature p {
                margin: 0;
                font-size: 0.875rem;
                color: var(--muted);
            }

            .steps {
                display: grid;
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 20px;
                counter-reset: step;
            }

            .step {
                position: relative;
                padding: 26px 24px;
                border-radius: var(--radius-lg);
                background: rgba(255, 255, 255, 0.7);
                border: 1px solid var(--line);
            }

            .step__number {
                display: grid;
                place-items: center;
                width: 36px;
                height: 36px;
                margin-bottom: 16px;
                border-radius: 10px;
                background: var(--ink);
                color: #fff;
                font-size: 0.875rem;
                font-weight: 700;
            }

            .step h3 {
                margin: 0 0 6px;
                font-size: 1rem;
            }

            .step p {
                margin: 0;
                font-size: 0.875rem;
                color: var(--muted);
            }

            /* ---------- CTA ---------- */

            .cta {
                position: relative;
                overflow: hidden;
                padding: 52px;
                border-radius: 28px;
                background:
                    radial-gradient(560px 240px at 88% 0%, rgba(245, 158, 11, 0.28), transparent 70%),
                    radial-gradient(520px 260px at 8% 100%, rgba(59, 130, 246, 0.35), transparent 70%),
                    #0b1526;
                color: #fff;
                display: grid;
                grid-template-columns: 1.15fr auto;
                align-items: center;
                gap: 32px;
                box-shadow: 0 36px 70px -46px rgba(11, 21, 38, 0.9);
            }

            .cta h2 {
                margin: 0 0 10px;
                font-size: clamp(1.6rem, 2.6vw, 2.125rem);
                line-height: 1.2;
                letter-spacing: -0.025em;
            }

            .cta p {
                margin: 0;
                max-width: 34rem;
                color: rgba(255, 255, 255, 0.72);
                font-size: 0.9375rem;
            }

            .cta__actions {
                display: flex;
                flex-wrap: wrap;
                gap: 12px;
            }

            .btn--light {
                background: #fff;
                color: var(--ink);
                box-shadow: 0 14px 26px -16px rgba(0, 0, 0, 0.9);
            }

            .btn--light:hover {
                transform: translateY(-2px);
                background: #f4f7fd;
            }

            .btn--ghost {
                background: rgba(255, 255, 255, 0.06);
                color: #fff;
                border-color: rgba(255, 255, 255, 0.28);
            }

            .btn--ghost:hover {
                transform: translateY(-2px);
                background: rgba(255, 255, 255, 0.14);
                border-color: rgba(255, 255, 255, 0.5);
            }

            .btn--light:focus-visible,
            .btn--ghost:focus-visible {
                outline-color: rgba(255, 255, 255, 0.7);
            }

            /* ---------- Footer ---------- */

            .site-footer {
                margin-top: 80px;
                padding: 28px 0 36px;
                border-top: 1px solid var(--line);
                font-size: 0.8125rem;
                color: var(--muted);
            }

            .site-footer__inner {
                display: flex;
                flex-wrap: wrap;
                align-items: center;
                justify-content: space-between;
                gap: 14px;
            }

            /* ---------- Toast ---------- */

            .toast {
                position: fixed;
                left: 50%;
                bottom: 28px;
                z-index: 60;
                display: flex;
                align-items: center;
                gap: 11px;
                padding: 13px 20px 13px 14px;
                border-radius: var(--radius-md);
                background: #0b1526;
                color: #fff;
                font-size: 0.875rem;
                font-weight: 500;
                box-shadow: 0 24px 46px -22px rgba(11, 21, 38, 0.85);
                opacity: 0;
                transform: translate(-50%, 14px);
                pointer-events: none;
                transition: opacity 0.22s ease, transform 0.22s ease;
                max-width: calc(100vw - 32px);
            }

            .toast.is-visible {
                opacity: 1;
                transform: translate(-50%, 0);
            }

            .toast__icon {
                display: grid;
                place-items: center;
                width: 28px;
                height: 28px;
                flex: none;
                border-radius: 8px;
                background: rgba(245, 158, 11, 0.18);
                color: #fbbf24;
            }

            .toast__icon svg {
                width: 16px;
                height: 16px;
            }

            /* ---------- Responsive ---------- */

            @media (max-width: 960px) {
                .hero__grid {
                    grid-template-columns: 1fr;
                    gap: 44px;
                }

                .hero {
                    padding: 48px 0 60px;
                }

                .cards {
                    grid-template-columns: repeat(2, minmax(0, 1fr));
                }

                .cta {
                    grid-template-columns: 1fr;
                    padding: 40px 32px;
                }

                .floating--saved {
                    right: 10px;
                    bottom: -18px;
                }
            }

            @media (max-width: 760px) {
                .site-nav {
                    display: none;
                }

                .header-note {
                    display: none;
                }

                .steps {
                    grid-template-columns: 1fr;
                }

                .hero__actions .btn {
                    width: 100%;
                }
            }

            @media (max-width: 600px) {
                .cards {
                    grid-template-columns: 1fr;
                }

                .section {
                    padding: 52px 0;
                }

                .row {
                    grid-template-columns: 1fr auto;
                }

                .row__qty {
                    display: none;
                }

                .site-header__inner {
                    height: 64px;
                }
            }

            @media (prefers-reduced-motion: reduce) {
                html {
                    scroll-behavior: auto;
                }

                *,
                *::before,
                *::after {
                    transition-duration: 0.01ms !important;
                    animation-duration: 0.01ms !important;
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
                    <a href="#fitur">Fitur</a>
                    <a href="#alur">Alur Kerja</a>
                    <a href="#mulai">Mulai</a>
                </nav>

                <div class="header-note">
                    <span class="dot" aria-hidden="true"></span>
                    Sistem pendataan barang
                </div>
            </div>
        </header>

        <main>
            <section class="hero">
                <div class="container hero__grid">
                    <div>
                        <p class="eyebrow">
                            <span class="badge">Baru</span>
                            Pendataan barang gudang dalam satu dasbor
                        </p>

                        <h1>Barang gudang tertata, stok selalu <span class="highlight">akurat</span>.</h1>

                        <p class="hero__lead">
                            GudangKu membantu tim gudang mencatat barang masuk dan keluar, memantau jumlah stok,
                            serta mengelola data pegawai tanpa perlu berkas spreadsheet yang berserakan.
                        </p>

                        <div class="hero__actions">
                            <button type="button" class="btn btn--primary" data-action="barang">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M12 5v14M5 12h14" />
                                </svg>
                                Tambah Barang
                            </button>

                            <button type="button" class="btn btn--secondary" data-action="pegawai">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                    <circle cx="9" cy="7" r="4" />
                                    <path d="M19 8v6M22 11h-6" />
                                </svg>
                                Tambah Pegawai
                            </button>
                        </div>

                        <ul class="hero__meta">
                            <li>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="m5 13 4 4L19 7" />
                                </svg>
                                Riwayat stok otomatis
                            </li>
                            <li>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="m5 13 4 4L19 7" />
                                </svg>
                                Data pegawai terpusat
                            </li>
                        </ul>
                    </div>

                    <div class="preview">
                        <div class="preview__glow" aria-hidden="true"></div>

                        <div class="card" aria-hidden="true">
                            <div class="card__bar">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="url">gudangku.app/barang</span>
                            </div>

                            <div class="card__body">
                                <div class="card__head">
                                    <h2>Daftar Barang</h2>
                                    <span>128 item</span>
                                </div>

                                <ul class="rows">
                                    <li class="row">
                                        <span class="row__item">
                                            <span class="row__icon">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M21 8 12 3 3 8v8l9 5 9-5z" />
                                                    <path d="M3 8l9 5 9-5M12 21v-8" />
                                                </svg>
                                            </span>
                                            <span>
                                                <span class="row__name">Kardus Karton 40×30</span>
                                                <span class="row__cat">Kemasan · Rak A1</span>
                                            </span>
                                        </span>
                                        <span class="row__qty">240 pcs</span>
                                        <span class="chip chip--ok">Aman</span>
                                    </li>

                                    <li class="row">
                                        <span class="row__item">
                                            <span class="row__icon">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="8" />
                                                    <circle cx="12" cy="12" r="3" />
                                                </svg>
                                            </span>
                                            <span>
                                                <span class="row__name">Lakban Bening 2 inci</span>
                                                <span class="row__cat">Perlengkapan · Rak B2</span>
                                            </span>
                                        </span>
                                        <span class="row__qty">48 roll</span>
                                        <span class="chip chip--low">Menipis</span>
                                    </li>

                                    <li class="row">
                                        <span class="row__item">
                                            <span class="row__icon">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M12 3a7 7 0 0 0-4 12.7V18h8v-2.3A7 7 0 0 0 12 3z" />
                                                    <path d="M9 21h6" />
                                                </svg>
                                            </span>
                                            <span>
                                                <span class="row__name">Helm Proyek Kuning</span>
                                                <span class="row__cat">APD · Rak C1</span>
                                            </span>
                                        </span>
                                        <span class="row__qty">12 pcs</span>
                                        <span class="chip chip--low">Menipis</span>
                                    </li>

                                    <li class="row">
                                        <span class="row__item">
                                            <span class="row__icon">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M4 8h16v12H4zM4 8l2-4h12l2 4M9 12h6" />
                                                </svg>
                                            </span>
                                            <span>
                                                <span class="row__name">Palet Kayu Standar</span>
                                                <span class="row__cat">Logistik · Area D</span>
                                            </span>
                                        </span>
                                        <span class="row__qty">96 unit</span>
                                        <span class="chip chip--ok">Aman</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="card__foot">
                                <span>Kapasitas gudang</span>
                                <span class="progress"><span></span></span>
                                <span>72%</span>
                            </div>
                        </div>

                        <div class="floating floating--saved" aria-hidden="true">
                            <span class="floating__icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m5 13 4 4L19 7" />
                                </svg>
                            </span>
                            <span>
                                Stok diperbarui
                                <small>oleh Sari · baru saja</small>
                            </span>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section" id="fitur">
                <div class="container">
                    <div class="section__head">
                        <span class="section__label">Fitur</span>
                        <h2>Semua yang dibutuhkan untuk merapikan gudang</h2>
                        <p>Dirancang sederhana agar petugas gudang bisa langsung memakainya, tanpa pelatihan panjang.</p>
                    </div>

                    <div class="cards">
                        <article class="feature">
                            <span class="feature__icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M21 8 12 3 3 8v8l9 5 9-5z" />
                                    <path d="M3 8l9 5 9-5M12 21v-8" />
                                </svg>
                            </span>
                            <h3>Pencatatan barang</h3>
                            <p>Simpan nama, kategori, satuan, lokasi rak, dan jumlah stok setiap barang dalam satu data yang rapi.</p>
                        </article>

                        <article class="feature">
                            <span class="feature__icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M12 20V10M6 20v-4M18 20V4" />
                                    <path d="m3 15 4-4 4 3 5-6 4 2" />
                                </svg>
                            </span>
                            <h3>Stok masuk &amp; keluar</h3>
                            <p>Setiap penambahan dan pengurangan stok tercatat sebagai riwayat, jadi tidak ada lagi selisih hitungan.</p>
                        </article>

                        <article class="feature">
                            <span class="feature__icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                    <circle cx="9.5" cy="7" r="4" />
                                    <path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13A4 4 0 0 1 16 11" />
                                </svg>
                            </span>
                            <h3>Data pegawai</h3>
                            <p>Kelola daftar pegawai gudang sekaligus tahu siapa penanggung jawab setiap pencatatan barang.</p>
                        </article>

                        <article class="feature">
                            <span class="feature__icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <circle cx="11" cy="11" r="7" />
                                    <path d="m20 20-3.5-3.5" />
                                </svg>
                            </span>
                            <h3>Pencarian cepat</h3>
                            <p>Temukan barang berdasarkan nama, kategori, atau lokasi rak dalam hitungan detik saat dibutuhkan.</p>
                        </article>
                    </div>
                </div>
            </section>

            <section class="section section--tight" id="alur">
                <div class="container">
                    <div class="section__head">
                        <span class="section__label">Alur kerja</span>
                        <h2>Tiga langkah, gudang langsung tertata</h2>
                        <p>Mulai dari data pegawai, lanjut ke data barang, lalu pantau stoknya setiap hari.</p>
                    </div>

                    <div class="steps">
                        <div class="step">
                            <span class="step__number">1</span>
                            <h3>Daftarkan pegawai</h3>
                            <p>Tambahkan pegawai gudang sebagai penanggung jawab pencatatan barang.</p>
                        </div>

                        <div class="step">
                            <span class="step__number">2</span>
                            <h3>Catat barang</h3>
                            <p>Masukkan nama, kategori, satuan, lokasi rak, dan jumlah stok awal barang.</p>
                        </div>

                        <div class="step">
                            <span class="step__number">3</span>
                            <h3>Pantau stok</h3>
                            <p>Lihat ringkasan stok dan riwayat perubahan barang kapan pun dibutuhkan.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section section--tight" id="mulai">
                <div class="container">
                    <div class="cta">
                        <div>
                            <h2>Siap merapikan gudang Anda?</h2>
                            <p>Mulai dari dua hal sederhana: daftarkan pegawai, lalu catat barang pertama Anda.</p>
                        </div>

                        <div class="cta__actions">
                            <button type="button" class="btn btn--light" data-action="pegawai">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                    <circle cx="9" cy="7" r="4" />
                                    <path d="M19 8v6M22 11h-6" />
                                </svg>
                                Tambah Pegawai
                            </button>

                            <button type="button" class="btn btn--ghost" data-action="barang">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M12 5v14M5 12h14" />
                                </svg>
                                Tambah Barang
                            </button>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer class="site-footer">
            <div class="container site-footer__inner">
                <span>&copy; {{ date('Y') }} GudangKu — Sistem pendataan barang gudang.</span>
                <span>Dibuat untuk tim gudang yang ingin kerja lebih rapi.</span>
            </div>
        </footer>

        <div class="toast" id="toast" role="status" aria-live="polite">
            <span class="toast__icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 8v5M12 16.5v.5" />
                    <circle cx="12" cy="12" r="9" />
                </svg>
            </span>
            <span id="toast-message"></span>
        </div>

        <script>
            (function () {
                const messages = {
                    barang: 'Form Tambah Barang belum tersedia — fitur ini segera hadir.',
                    pegawai: 'Form Tambah Pegawai belum tersedia — fitur ini segera hadir.',
                };

                const toast = document.getElementById('toast');
                const toastMessage = document.getElementById('toast-message');
                let hideTimer = null;

                document.querySelectorAll('[data-action]').forEach(function (button) {
                    button.addEventListener('click', function () {
                        toastMessage.textContent = messages[button.dataset.action] ?? 'Fitur segera hadir.';
                        toast.classList.add('is-visible');

                        window.clearTimeout(hideTimer);
                        hideTimer = window.setTimeout(function () {
                            toast.classList.remove('is-visible');
                        }, 3200);
                    });
                });
            })();
        </script>
    </body>
</html>
