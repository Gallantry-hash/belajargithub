@extends('layouts.app')

@section('title', 'Daftar Barang — GudangKu')

@section('content')
    <div class="page-head">
        <div>
            <h1>Daftar Barang</h1>
            <p>Semua barang yang tercatat di gudang, lengkap dengan stok dan lokasi raknya.</p>
        </div>

        <a href="{{ route('barang.create') }}" class="btn btn--primary">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M12 5v14M5 12h14" />
            </svg>
            Tambah Barang
        </a>
    </div>

    @if (session('success'))
        <div class="alert" role="status">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="m5 13 4 4L19 7" />
            </svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="card table-card">
        @if ($barangs->isEmpty())
            <div class="empty-state">
                <span class="empty-state__icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 8 12 3 3 8v8l9 5 9-5z" />
                        <path d="M3 8l9 5 9-5M12 21v-8" />
                    </svg>
                </span>
                <h2>Belum ada barang</h2>
                <p>Mulai dengan menambahkan barang pertama ke gudang.</p>
                <a href="{{ route('barang.create') }}" class="btn btn--primary">Tambah Barang</a>
            </div>
        @else
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th scope="col">Barang</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Status</th>
                            <th scope="col">Ditambahkan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangs as $barang)
                            <tr>
                                <td>
                                    <span class="item-name">{{ $barang->nama }}</span>
                                    <span class="item-meta">{{ $barang->kategori }} &middot; {{ $barang->lokasi_rak }}</span>
                                </td>
                                <td>
                                    <span class="stock">{{ $barang->stok }} {{ $barang->satuan }}</span>
                                </td>
                                <td>
                                    <span @class(['chip', 'chip--low' => $barang->stok <= 20, 'chip--ok' => $barang->stok > 20])>
                                        {{ $barang->stok <= 20 ? 'Menipis' : 'Aman' }}
                                    </span>
                                </td>
                                <td>{{ $barang->created_at->format('d/m/Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if ($barangs->hasPages())
                <nav class="pagination" aria-label="Navigasi halaman barang">
                    <span>Halaman {{ $barangs->currentPage() }} dari {{ $barangs->lastPage() }}</span>

                    <div class="pagination__links">
                        @if ($barangs->onFirstPage())
                            <span class="page-link is-disabled" aria-disabled="true">Sebelumnya</span>
                        @else
                            <a href="{{ $barangs->previousPageUrl() }}" rel="prev">Sebelumnya</a>
                        @endif

                        @if ($barangs->hasMorePages())
                            <a href="{{ $barangs->nextPageUrl() }}" rel="next">Berikutnya</a>
                        @else
                            <span class="page-link is-disabled" aria-disabled="true">Berikutnya</span>
                        @endif
                    </div>
                </nav>
            @endif
        @endif
    </div>
@endsection
