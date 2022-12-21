<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class KepalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Kepala1',
            'no_hp' => '089501860575',
            'gender' => 'L',
            'alamat' => 'Subang',
            'email' => 'kepala1@kepala.com',
            'password' => bcrypt('123456'),
            'role' => 'kepala_lab'
        ]);
    }
}
