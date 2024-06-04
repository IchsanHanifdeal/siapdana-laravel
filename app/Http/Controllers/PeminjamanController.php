<?php

namespace App\Http\Controllers;

use App\Models\Cicilan;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

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
        DB::beginTransaction();

        try {
            $peminjaman = Peminjaman::findOrFail($id_peminjaman);
            $peminjaman->validasi = 'diterima';
            $peminjaman->save();

            $tenor = $peminjaman->tenor;
            $jumlah = $peminjaman->jumlah;
            $jumlah_angsuran = ($jumlah / $tenor) * 1.1;
            $tanggal_jatuh_tempo = Carbon::now()->addMonth(); 

            for ($i = 0; $i < $tenor; $i++) {
                Cicilan::create([
                    'id_peminjaman' => $id_peminjaman,
                    'tanggal_jatuhtempo' => $tanggal_jatuh_tempo->copy()->addMonths($i),
                    'jumlah_angsuran' => $jumlah_angsuran,
                    'sisa_bulan' => $tenor - $i,
                    'status' => 'belum bayar',
                ]);
            }

            DB::commit();
            return back()->with('success', 'Peminjaman Diterima.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
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
    public function bayar_cicilan(Request $request, $id_cicilan)
    {
        $cicilan = Cicilan::findOrFail($id_cicilan);
        $cicilan->status = 'Sudah Bayar';
        $cicilan->tanggal_pembayaran = now();
        $cicilan->save();

        return back()->with('success', 'Cicilan Diterima.');
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
