<?php

namespace Database\Seeders;

use App\Models\Peminjaman;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Peminjaman::create([
          'id_user' => '2',  
          'jumlah' => '1000000',  
          'tenor' => '24 Bulan',  
          'tanggal' => now(),  
          'validasi' => 'diterima',  
        ]);
        Peminjaman::create([
          'id_user' => '2',  
          'jumlah' => '1000000',  
          'tenor' => '24 Bulan',  
          'tanggal' => now(),  
          'validasi' => 'ditolak',  
        ]);
        Peminjaman::create([
          'id_user' => '2',  
          'jumlah' => '1000000',  
          'tenor' => '24 Bulan',  
          'tanggal' => now(),  
          'validasi' => 'menunggu persetujuan',  
        ]);
        Peminjaman::create([
          'id_user' => '3',  
          'jumlah' => '1000000',  
          'tenor' => '24 Bulan',  
          'tanggal' => now(),  
          'validasi' => 'diterima',  
        ]);
        Peminjaman::create([
          'id_user' => '3',  
          'jumlah' => '1000000',  
          'tenor' => '24 Bulan',  
          'tanggal' => now(),  
          'validasi' => 'ditolak',  
        ]);
        Peminjaman::create([
          'id_user' => '3',  
          'jumlah' => '1000000',  
          'tenor' => '24 Bulan',  
          'tanggal' => now(),  
          'validasi' => 'menunggu persetujuan',  
        ]);
    }
}
