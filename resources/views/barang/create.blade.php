@extends('layouts.app')

@section('title', 'Tambah Barang — GudangKu')

@section('content')
    <a href="{{ route('barang.index') }}" class="back-link">
        <span aria-hidden="true">&larr;</span>
        Kembali ke daftar barang
    </a>

    <div class="page-head">
        <div>
            <h1>Tambah Barang</h1>
            <p>Catat barang baru beserta stok awalnya agar data gudang tetap rapi.</p>
        </div>
    </div>

    <div class="card form-card">
        <form method="POST" action="{{ route('barang.store') }}">
            @csrf

            <div class="form-grid">
                <div class="field field--full">
                    <label for="nama">Nama Barang</label>
                    <input
                        id="nama"
                        name="nama"
                        type="text"
                        value="{{ old('nama') }}"
                        maxlength="255"
                        placeholder="Contoh: Kardus Karton 40×30"
                        autofocus
                        required
                        @class(['is-invalid' => $errors->has('nama')])
                    >
                    @error('nama')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label for="kategori">Kategori</label>
                    <input
                        id="kategori"
                        name="kategori"
                        type="text"
                        value="{{ old('kategori') }}"
                        maxlength="100"
                        placeholder="Contoh: Kemasan"
                        required
                        @class(['is-invalid' => $errors->has('kategori')])
                    >
                    @error('kategori')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label for="satuan">Satuan</label>
                    <input
                        id="satuan"
                        name="satuan"
                        type="text"
                        value="{{ old('satuan') }}"
                        maxlength="50"
                        placeholder="Contoh: pcs"
                        list="satuan-options"
                        required
                        @class(['is-invalid' => $errors->has('satuan')])
                    >
                    <datalist id="satuan-options">
                        <option value="pcs"></option>
                        <option value="unit"></option>
                        <option value="roll"></option>
                        <option value="box"></option>
                        <option value="kg"></option>
                        <option value="liter"></option>
                    </datalist>
                    @error('satuan')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label for="lokasi_rak">Lokasi Rak</label>
                    <input
                        id="lokasi_rak"
                        name="lokasi_rak"
                        type="text"
                        value="{{ old('lokasi_rak') }}"
                        maxlength="100"
                        placeholder="Contoh: Rak A1"
                        required
                        @class(['is-invalid' => $errors->has('lokasi_rak')])
                    >
                    @error('lokasi_rak')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label for="stok">Jumlah Stok Awal</label>
                    <input
                        id="stok"
                        name="stok"
                        type="number"
                        value="{{ old('stok', 0) }}"
                        min="0"
                        step="1"
                        inputmode="numeric"
                        required
                        @class(['is-invalid' => $errors->has('stok')])
                    >
                    <span class="hint">Masukkan jumlah barang yang tersedia saat ini.</span>
                    @error('stok')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn--primary">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" />
                        <path d="M17 21v-8H7v8M7 3v5h8" />
                    </svg>
                    Simpan Barang
                </button>

                <a href="{{ route('barang.index') }}" class="btn btn--secondary">Batal</a>
            </div>
        </form>
    </div>
@endsection
