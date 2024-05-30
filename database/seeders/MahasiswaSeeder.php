<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mahasiswa::create([
            'nim' => '2205036',
            'nama' => 'Bima Ryan Alfarizi',
            'kelas' => 'D4 Rekayasa Perangkat Lunak 2B',
            'jurusan' => 'Teknik Informatika',
            'prodi' => 'Rekayasa Perangkat Lunak',
        ]);

        Mahasiswa::create([
            'nim' => '2205031',
            'nama' => 'Aditya Wisnu Setya Pamungkas',
            'kelas' => 'D4 Rekayasa Perangkat Lunak 2B',
            'jurusan' => 'Teknik Informatika',
            'prodi' => 'Rekayasa Perangkat Lunak',
        ]);
    }
}
