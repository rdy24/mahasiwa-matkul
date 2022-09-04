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
    }
}
