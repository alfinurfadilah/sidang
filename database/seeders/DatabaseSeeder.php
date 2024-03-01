<?php

namespace Database\Seeders;
use App\Models\User;
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

        \App\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'divisi' => 'Admin',
            'aktif' => '1',

            
        ]);

        \App\Models\User::create([
            'name' => 'noc',
            'email' => 'noc@gmail.com',
            'password' => bcrypt('12345678'),
            'divisi' => 'Noc',
            'aktif' => '1',

            
        ]);

        \App\Models\User::create([
            'name' => 'teknisi',
            'email' => 'teknisi@gmail.com',
            'password' => bcrypt('12345678'),
            'divisi' => 'Teknisi',
            'aktif' => '1',

            
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

        
        \App\Models\Site::create([
            'site' => 'Site Rangmul',
            'alamat_site' => 'blebleble',

            
        ]);
    }

    
}
