<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Data Pegawai — GudangKu</title>

        @include('partials.styles')
    </head>
    <body>
        @include('partials.page-header')

        <main class="page">
            <div class="container">
                <nav class="crumbs" aria-label="Breadcrumb">
                    <a href="{{ url('/') }}">Beranda</a>
                    <span aria-hidden="true">/</span>
                    <span>Data Pegawai</span>
                </nav>

                <div class="page__head">
                    <div>
                        <h1 class="page__title">Data Pegawai</h1>
                        <p class="page__lead">
                            Daftar pegawai gudang yang sudah terdaftar. Tambahkan pegawai baru agar setiap pencatatan
                            barang bisa dikaitkan dengan penanggung jawabnya.
                        </p>
                    </div>

                    <a href="{{ route('pegawai.create') }}" class="btn btn--primary">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M12 5v14M5 12h14" />
                        </svg>
                        Tambah Pegawai
                    </a>
                </div>

                @if (session('status'))
                    <div class="alert alert--success" role="status">
                        <span aria-hidden="true">✓</span>
                        <span>{{ session('status') }}</span>
                    </div>
                @endif

                <div class="card">
                    @if ($pegawai->isEmpty())
                        <div class="empty-state">
                            <h3>Belum ada pegawai terdaftar</h3>
                            <p>Mulai dengan menambahkan pegawai pertama Anda.</p>
                            <a href="{{ route('pegawai.create') }}" class="btn btn--primary">Tambah Pegawai</a>
                        </div>
                    @else
                        <div class="table-wrap">
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Jabatan</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">No. Telepon</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Ditambahkan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pegawai as $orang)
                                        <tr>
                                            <td><strong>{{ $orang->nama }}</strong></td>
                                            <td><span class="chip">{{ $orang->jabatan }}</span></td>
                                            <td class="{{ $orang->email ? '' : 'cell-muted' }}">{{ $orang->email ?? '—' }}</td>
                                            <td class="{{ $orang->nomor_telepon ? '' : 'cell-muted' }}">{{ $orang->nomor_telepon ?? '—' }}</td>
                                            <td class="{{ $orang->alamat ? '' : 'cell-muted' }}">{{ $orang->alamat ?? '—' }}</td>
                                            <td class="cell-muted">{{ $orang->created_at->format('d M Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
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
