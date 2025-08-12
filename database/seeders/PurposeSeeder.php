<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Purpose;

class PurposeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Purpose::create(
            ['purpose_type'     => 'Kunjungan']
        );
        Purpose::create(
            ['purpose_type'     => 'Permintaan Data dan Informasi']
        );
    }
}
