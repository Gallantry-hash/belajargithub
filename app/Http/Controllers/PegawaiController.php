<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePegawaiRequest;
use App\Models\Pegawai;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PegawaiController extends Controller
{
    /**
     * Display the list of pegawai.
     */
    public function index(): View
    {
        return view('pegawai.index', [
            'pegawai' => Pegawai::latest()->get(),
        ]);
    }

    /**
     * Show the form for adding a new pegawai.
     */
    public function create(): View
    {
        return view('pegawai.create');
    }

    /**
     * Store a newly created pegawai.
     */
    public function store(StorePegawaiRequest $request): RedirectResponse
    {
        $pegawai = Pegawai::create($request->validated());

        return redirect()
            ->route('pegawai.index')
            ->with('status', "Pegawai {$pegawai->nama} berhasil ditambahkan.");
    }
}
