<?php

namespace Database\Seeders;

use App\Models\Krs;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(20)->create();
        Mahasiswa::factory(20)->create();
        MataKuliah::factory(30)->create();
        Krs::factory(50)->create();

        User::create([
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => bcrypt('12345678'),
            'role' => 'admin',
        ]);
        User::create([
            'email' => 'admin1@gmail.com',
            'username' => 'admin1',
            'password' => bcrypt('12345678'),
            'role' => 'admin',
        ]);
        User::create([
            'email' => 'mahasiswa@gmail.com',
            'username' => 'mahasiswa',
            'password' => bcrypt('12345678'),
            'role' => 'mahasiswa',
        ]);
        Mahasiswa::create([
            'user_id' => 24,
            'nim' => '12345678',
            'nama' => 'Mahasiswa',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Jl. Jalan',
            'tanggal_lahir' => '2000-01-01',
        ]);
    }
}
