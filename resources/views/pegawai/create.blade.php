<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tambah Pegawai — GudangKu</title>

        @include('partials.styles')
    </head>
    <body>
        @include('partials.page-header')

        <main class="page">
            <div class="container">
                <nav class="crumbs" aria-label="Breadcrumb">
                    <a href="{{ url('/') }}">Beranda</a>
                    <span aria-hidden="true">/</span>
                    <a href="{{ route('pegawai.index') }}">Data Pegawai</a>
                    <span aria-hidden="true">/</span>
                    <span>Tambah</span>
                </nav>

                <div class="page__head">
                    <div>
                        <h1 class="page__title">Tambah Pegawai</h1>
                        <p class="page__lead">Isi data pegawai gudang. Kolom bertanda * wajib diisi.</p>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert--error" role="alert">
                        <span aria-hidden="true">!</span>
                        <div>
                            <strong>Data belum bisa disimpan.</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <div class="card">
                    <form method="POST" action="{{ route('pegawai.store') }}">
                        @csrf

                        <div class="form-grid">
                            <div class="field">
                                <label for="nama">Nama pegawai *</label>
                                <input
                                    type="text"
                                    id="nama"
                                    name="nama"
                                    value="{{ old('nama') }}"
                                    placeholder="Contoh: Budi Santoso"
                                    maxlength="100"
                                    required
                                    autofocus
                                    @class(['is-invalid' => $errors->has('nama')])
                                >
                                @error('nama')
                                    <p class="field__error">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="field">
                                <label for="jabatan">Jabatan *</label>
                                <input
                                    type="text"
                                    id="jabatan"
                                    name="jabatan"
                                    value="{{ old('jabatan') }}"
                                    placeholder="Contoh: Staf Gudang"
                                    maxlength="100"
                                    required
                                    autocomplete="organization-title"
                                    @class(['is-invalid' => $errors->has('jabatan')])
                                >
                                @error('jabatan')
                                    <p class="field__error">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="field">
                                <label for="email">Email <span class="optional">(opsional)</span></label>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="nama@perusahaan.com"
                                    maxlength="255"
                                    autocomplete="email"
                                    @class(['is-invalid' => $errors->has('email')])
                                >
                                @error('email')
                                    <p class="field__error">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="field">
                                <label for="nomor_telepon">Nomor telepon <span class="optional">(opsional)</span></label>
                                <input
                                    type="text"
                                    id="nomor_telepon"
                                    name="nomor_telepon"
                                    value="{{ old('nomor_telepon') }}"
                                    placeholder="08123456789"
                                    maxlength="25"
                                    inputmode="tel"
                                    autocomplete="tel"
                                    @class(['is-invalid' => $errors->has('nomor_telepon')])
                                >
                                @error('nomor_telepon')
                                    <p class="field__error">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="field field--full">
                                <label for="alamat">Alamat <span class="optional">(opsional)</span></label>
                                <textarea
                                    id="alamat"
                                    name="alamat"
                                    placeholder="Alamat tempat tinggal pegawai"
                                    maxlength="500"
                                    autocomplete="street-address"
                                    @class(['is-invalid' => $errors->has('alamat')])
                                >{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <p class="field__error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn--primary">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M12 5v14M5 12h14" />
                                </svg>
                                Simpan Pegawai
                            </button>

                            <a href="{{ route('pegawai.index') }}" class="btn btn--outline">Batal</a>
                        </div>
                    </form>
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
