<?php

namespace Database\Seeders;

use App\Models\MainCategory;
use Illuminate\Database\Seeder;

class MainCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     public function run()
    {
        //
        $mainCategory = [
            // 1
            [
                'name' => 'نجارة',

            ],
            // 2
            [
                'name' => 'تنجيد وديكور',

            ],
            // 3
            [
                'name' => 'طباعة',

            ],
            // 4
            [
                'name' => 'تشكيل معادن',

            ],
            // 5
            [
                'name' => 'ميكاترونكس',

            ],
            // 6
            [
                'name' => 'تكييف وتبريد',

            ],
            // 7
            [
                'name' => 'كهرباء',

            ],
            // 8
            [
                'name' => 'الإدارة العامة',

            ],
            [
                'name' => 'المدرسة الاساسية',

            ],
            [
                'name' => 'المدرسة الثانوية',

            ],
            [
                'name' => 'رياض الاطفال',

            ],
             [
                'name' => 'المطبخ',

            ],
             [
                'name' => 'السكن الداخلي',

            ],

        ];

        foreach ($mainCategory as $key => $value) {
            MainCategory::create($value);
        }
    }
}
