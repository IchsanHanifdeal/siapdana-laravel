<?php

namespace Database\Seeders;

use App\Models\Kreditur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KrediturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kreditur::create([
            'id_user' => '2',
            'no_handphone' => '08123456789',
            'tempat' => 'Duri',
            'tanggal_lahir' => now(),
            'pekerjaan' => 'BebanKeluarga',
            'alamat' => 'Pekanbaru',
        ]);

        Kreditur::create([
            'id_user' => '3',
            'no_handphone' => '08123456543',
            'tempat' => 'Duri',
            'tanggal_lahir' => now(),
            'pekerjaan' => 'BebanKeluarga',
            'alamat' => 'Pekanbaru',
        ]);
    }
}
