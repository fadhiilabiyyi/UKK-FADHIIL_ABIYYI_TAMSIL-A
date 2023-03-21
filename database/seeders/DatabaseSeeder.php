<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Officer;
use App\Models\Category;
use App\Models\Community;
use App\Models\Complaint;
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

        // Category Seeder
        Category::create([
            'name' => 'Agama',
            'slug' => 'agama'
        ]);

        Category::create([
            'name' => 'Ekonomi dan Keuangan',
            'slug' => 'ekonomi-dan-keuangan'
        ]);

        Category::create([
            'name' => 'Kesehatan',
            'slug' => 'kesehatan'
        ]);

        Category::create([
            'name' => 'Lingkungan Hidup dan Kehutanan',
            'slug' => 'lingkungan-hidup-dan-kehutanan'
        ]);

        Category::create([
            'name' => 'Pendidikan dan Kebudayaan',
            'slug' => 'pendidikan-dan-kebudayaan'
        ]);

        Category::create([
            'name' => 'Pertanian dan Perternakan',
            'slug' => 'pertanian-dan-peternakan'
        ]);

        Category::create([
            'name' => 'Politik dan Hukum',
            'slug' => 'politik-dan-hukum'
        ]);

        Category::create([
            'name' => 'Sosial dan Kesejahteraan',
            'slug' => 'sosial-dan-kesejahteraan'
        ]);

        Category::create([
            'name' => 'Kependudukan',
            'slug' => 'kependudukan'
        ]);

        Category::create([
            'name' => 'Perlindungan Konsumen',
            'slug' => 'perlindungan-konsumen'
        ]);

        Complaint::create([
            'title' => 'Kucing Hilang ey',
            'slug' => 'kucing-hilang-ey',
            'category_id' => 1,
            'community_id' => 1,
            'date' => '2023-03-21',
            'complaint' => 'Kucing hilang',
            'image' => 'fafa',
            'status' => 'new',
            'created_at' => '2023-03-20 07:28:00',
            'updated_at' => '2023-03-20 07:28:00'
        ]);

        Complaint::create([
            'title' => 'Kucing Hilang ey',
            'slug' => 'kucing-hilang-ey-1',
            'category_id' => 1,
            'community_id' => 1,
            'date' => '2023-03-21',
            'complaint' => 'Kucing hilang',
            'image' => 'fafa',
            'status' => 'new',
            'created_at' => '2023-03-19 07:28:00',
            'updated_at' => '2023-03-19 07:28:00'
        ]);

        Complaint::create([
            'title' => 'Kucing Hilang ey',
            'slug' => 'kucing-hilang-ey-2',
            'category_id' => 1,
            'community_id' => 1,
            'date' => '2023-03-21',
            'complaint' => 'Kucing hilang',
            'image' => 'fafa',
            'status' => 'new',
            'created_at' => '2023-03-18 07:28:00',
            'updated_at' => '2023-03-18 07:28:00'
        ]);
    }
}
