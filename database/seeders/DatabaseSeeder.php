<?php

namespace Database\Seeders;
use App\Models\users;
use App\Models\Paket;
use App\Models\Site;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'divisi' => 'Admin',
            // 'Password' => '12345678',
            // 'aktif' => 'aktif',

            
        ]);
        

        \App\Models\Paket::create([
            'Nama_Paket' => 'Murmer-7Mbps',
            'Harga_Paket' => '100000',
        ]);

        \App\Models\Paket::create([
            'Nama_Paket' => 'Elite-15Mbps',
            'Harga_Paket' => '150000',

            
        ]);

         \App\Models\Site::create([
            'site' => 'Site Caca',
            'alamat_site' => 'Pasir Jambu',
        ]);

        \App\Models\Site::create([
            'site' => 'Site Gentar',
            'alamat_site' => 'blablabla',

            
        ]);
    }

    
}
