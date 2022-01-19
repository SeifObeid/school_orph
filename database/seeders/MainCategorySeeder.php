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
            [
                'name' => 'نجارة',

            ],
            [
                'name' => 'تنجيد وديكور',

            ],
            [
                'name' => 'طباعة',

            ],
            [
                'name' => 'تشكيل معادن',

            ],
            [
                'name' => 'ميكاترونكس',

            ],
            [
                'name' => 'تكييف وتبريد',

            ],
            [
                'name' => 'كهرباء',

            ],
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
