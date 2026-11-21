<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GudangKu — Sistem Pendataan Barang Gudang</title>
        <meta name="description" content="GudangKu membantu tim gudang mencatat barang masuk dan keluar, memantau stok, serta mengelola data pegawai dalam satu tempat.">

        @include('partials.styles')
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

                            <a href="{{ route('pegawai.create') }}" class="btn btn--secondary">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                    <circle cx="9" cy="7" r="4" />
                                    <path d="M19 8v6M22 11h-6" />
                                </svg>
                                Tambah Pegawai
                            </a>
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
                            <a href="{{ route('pegawai.create') }}" class="btn btn--light">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                    <circle cx="9" cy="7" r="4" />
                                    <path d="M19 8v6M22 11h-6" />
                                </svg>
                                Tambah Pegawai
                            </a>

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
