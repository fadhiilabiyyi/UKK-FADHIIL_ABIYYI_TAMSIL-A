<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Officer;
use App\Models\Community;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        Community::factory(10)->create();
        Officer::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Community::create([
            'nik' => '7565456787980001',
            'name' => 'Fadhiil Abiyyi Tamsil',
            'username' => 'masyarakat',
            'slug' => 'masyarakat',
            'password' => Hash::make('password'),
            'email' => 'masyarakat@gmail.com',
            'telp' => '+62 895 7864 8522'
        ]);

        Officer::create([
            'nik' => '7565456787980001',
            'name' => 'Fadhiil Abiyyi Tamsil',
            'username' => 'petugas',
            'slug' => 'petugas',
            'password' => Hash::make('password'),
            'email' => 'petugas@gmail.com',
            'telp' => '+62 895 7864 8522',
            'level' => 'officer'
        ]);

        Officer::create([
            'nik' => '3565456787980001',
            'name' => 'Fadhiil Abiyyi Tamsil',
            'username' => 'admin',
            'slug' => 'admin',
            'password' => Hash::make('password'),
            'email' => 'admin@gmail.com',
            'telp' => '+62 895 7864 8522',
            'level' => 'admin'
        ]);
    }
}
