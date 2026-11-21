<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BarangController extends Controller
{
    /**
     * Display a listing of the items.
     */
    public function index(): View
    {
        return view('barang.index', [
            'barangs' => Barang::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new item.
     */
    public function create(): View
    {
        return view('barang.create');
    }

    /**
     * Store a newly created item in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'kategori' => ['required', 'string', 'max:100'],
            'satuan' => ['required', 'string', 'max:50'],
            'lokasi_rak' => ['required', 'string', 'max:100'],
            'stok' => ['required', 'integer', 'min:0'],
        ], [
            'nama.required' => 'Nama barang wajib diisi.',
            'nama.max' => 'Nama barang maksimal 255 karakter.',
            'kategori.required' => 'Kategori wajib diisi.',
            'kategori.max' => 'Kategori maksimal 100 karakter.',
            'satuan.required' => 'Satuan wajib diisi.',
            'satuan.max' => 'Satuan maksimal 50 karakter.',
            'lokasi_rak.required' => 'Lokasi rak wajib diisi.',
            'lokasi_rak.max' => 'Lokasi rak maksimal 100 karakter.',
            'stok.required' => 'Jumlah stok wajib diisi.',
            'stok.integer' => 'Jumlah stok harus berupa angka bulat.',
            'stok.min' => 'Jumlah stok tidak boleh negatif.',
        ]);

        Barang::create($validated);

        return redirect()
            ->route('barang.index')
            ->with('success', 'Barang berhasil ditambahkan.');
    }
}
