<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Pengguna1',
            'no_hp' => '089501860575',
            'gender' => 'L',
            'alamat' => 'Subang',
            'email' => 'pengguna1@pengguna.com',
            'password' => bcrypt('123456'),
            'role' => 'pengguna'
        ]);
    }
}
