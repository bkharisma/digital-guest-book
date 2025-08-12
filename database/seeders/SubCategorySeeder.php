<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubCategory::create(
            ['sub_categories_type'     => 'Kunjungan Akademik',
             'id_categories'           => 1]
        );

        SubCategory::create(
            ['sub_categories_type'     => 'Kunjungan Kerjasama',
             'id_categories'           => 1]
        );

        SubCategory::create(
            ['sub_categories_type'     => 'Kunjungan Humas',
             'id_categories'           => 1]
        );

        SubCategory::create(
            ['sub_categories_type'     => 'Kunjungan Umum',
             'id_categories'           => 1]
        );
        SubCategory::create(
            ['sub_categories_type'     => 'Permintaan Informasi Publik',
             'id_categories'           => 2]
        );

        SubCategory::create(
            ['sub_categories_type'     => 'Keberatan Informasi Publik',
             'id_categories'           => 2]
        );
    }
}
