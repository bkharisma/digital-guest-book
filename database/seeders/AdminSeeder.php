<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'     => 'Budi Kharisma Setiawan',
            'email'    => 'bkharisma@poltekpar-palembang.ac.id',
            'role'     => 'Super Admin',
            'password' => bcrypt('Poltekpar123!@#'),
        ]);

        User::create([
            'name'     => 'Ahmad Mirza Rizky Pramanda',
            'email'    => 'ahmad_mirza@poltekpar-palembang.ac.id',
            'role'     => 'Super Admin',
            'password' => bcrypt('Poltekpar123!@#'),
        ]);

        User::create([
            'name'     => 'Muhammad Ridho Setyawan',
            'email'    => 'rs@poltekpar-palembang.ac.id',
            'role'     => 'Super Admin',
            'password' => bcrypt('Poltekpar123!@#'),
        ]);
    }
}
