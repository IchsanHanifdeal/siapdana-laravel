<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required',
            'jumlah' => 'required',
            'tenor' => 'required',
            'tanggal' => 'required',
        ]);

        $peminjaman = Peminjaman::create([
            'id_user' => $request->id_user,
            'jumlah' => $request->jumlah,
            'tenor' => $request->tenor,
            'tanggal' => $request->tanggal,
            'validasi' => 'menunggu persetujuan',
        ]);

        if (!$peminjaman) {
            toastr()->error('Gagal!');
            return redirect()->back();
        }

        toastr()->success('Pengajuan Pinjaman berhasil!');
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function terima(Request $request, $id_peminjaman)
    {
        $peminjaman = Peminjaman::findOrFail($id_peminjaman);
        $peminjaman->validasi = 'diterima';
        $peminjaman->save();

        return back()->with('success', 'Peminjaman Diterima.');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function tolak(Request $request, $id_peminjaman)
    {
        $peminjaman = Peminjaman::findOrFail($id_peminjaman);
        $peminjaman->validasi = 'ditolak';
        $peminjaman->save();

        return back()->with('success', 'Peminjaman ditolak.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        //
    }
}
