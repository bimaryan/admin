<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama' => 'Bima',
            'phone' => '1234567890',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        User::create([
            'nama' => 'Wisnu',
            'phone' => '0987654321',
            'password' => Hash::make('password123'),
            'role' => 'mahasiswa',
        ]);
    }
}
