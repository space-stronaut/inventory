<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Petugas1',
            'no_hp' => '089501860576',
            'shift_petugas' => 'malam',
            'email' => 'petugas1@petugas.com',
            'password' => bcrypt('123456'),
            'role' => 'petugas'
        ]);
    }
}
