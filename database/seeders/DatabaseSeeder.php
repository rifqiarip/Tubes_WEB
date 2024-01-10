<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::insert([
            [
                'nip' => '123456789',
                'pic' => '123456789',
                'nama' => 'Rifqi Ari',
                'fakultas' => 'Teknik',
                'profile_img' => 'user_profile.png',
                'role' => 'mahasiswa',
            ], [
                'nip' => '987654321',
                'pic' => '987654321',
                'nama' => 'Bashor Fauzan',
                'fakultas' => 'Teknik',
                'profile_img' => 'user_profile.png',
                'role' => 'dosen',
            ]
        ]);
    }
}
