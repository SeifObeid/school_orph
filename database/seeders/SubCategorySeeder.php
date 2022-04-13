<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         $subCategory = [
            [
                'name' => 'غرفة الرياضة',
                'main_category_id' => '8',

            ],
            [
                'name' => 'غرفة المدير',
                'main_category_id' => '8',

            ],
            [
                'name' => 'الحمام',
                'main_category_id' => '8',

            ],
        ];

         foreach ($subCategory as $key => $value) {
            SubCategory::create($value);
        }

    }
}
