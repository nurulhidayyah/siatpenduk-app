<?php

namespace Database\Seeders;

use App\Models\Active;
use App\Models\User;
use App\Models\UserRole;
use App\Models\WfReference;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        User::create([
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
            'phone' => '081212',
            'role_id' => 1,
            'is_active' => 2
        ]);
        User::create([
            'nama' => 'Kades',
            'email' => 'kades@gmail.com',
            'password' => Hash::make('123'),
            'phone' => '081212',
            'role_id' => 2,
            'is_active' => 2
        ]);

        UserRole::create([
            'role' => 'Administrator'
        ]);
        UserRole::create([
            'role' => 'Kepala Desa'
        ]);
        UserRole::create([
            'role' => 'Masyarakat'
        ]);

        Active::create([
            'active' => 'Belum Aktif'
        ]);
        Active::create([
            'active' => 'Aktif'
        ]);

        WfReference::create([
            'wp_name' => 'Surat Diajukan'
        ]);

        WfReference::create([
            'wp_name' => 'Surat Telah diteruskan Admin'
        ]);

        WfReference::create([
            'wp_name' => 'Surat Telah Selesai diproses'
        ]);

        WfReference::create([
            'wp_name' => 'Surat di Tolak Admin'
        ]);
    }
}
