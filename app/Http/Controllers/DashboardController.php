<?php

namespace App\Http\Controllers;

use App\Models\Kreditur;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $role = $request->session()->get('role');
        $nama = $request->session()->get('nama');
        $id_user = $request->session()->get('id_user');
        $kreditur = Kreditur::count();
        $peminjaman = Peminjaman::count();
        $peminjaman_ditolak = Peminjaman::where('validasi', 'ditolak')->count();
        $peminjaman_diterima = Peminjaman::where('validasi', 'diterima')->count();

        if ($role == 'admin') {
            return view('dashboard', [
                'title' => 'Dashboard',
                'active' => 'dashboard',
                'peminjaman' => Peminjaman::all(),
                'jumlah_kreditur' => $kreditur,
                'jumlah_peminjaman' => $peminjaman,
                'total_peminjaman_diterima' => $peminjaman_diterima,
                'jumlah_peminjaman_ditolak' => $peminjaman_ditolak,
                'role' => $role,
                'nama' => $nama,
                'id_user' => $id_user,
            ]);
        } else {
            $id_user = $request->session()->get('id_user');
            $role = $request->session()->get('role');
            $nama = $request->session()->get('nama');
            $peminjaman = Peminjaman::where('id_user', $id_user)->get();
            return view('dashboard', [
                'title' => 'Dashboard',
                'active' => 'dashboard',
                'nama' => $nama,
                'role' => $role,
                'id_user' => $id_user,
                'peminjaman' => $peminjaman,
            ]);
        }
    }
}
