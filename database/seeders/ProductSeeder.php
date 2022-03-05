<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         $products = [
            [
                'product_name' => "سم فأران",
                'product_unit' => '5001',
                'main_category_id' => '8',



            ],
            [
                'product_name' => "خبز",
                'product_unit' => '1',
                'main_category_id' => '8',
            ],
            [
                'product_name' => "سكر",
                'product_unit' => '1',
                'main_category_id' => '8',

            ],
             [
                'product_name' => "طاولة",
                'product_unit' => '1',
                'main_category_id' => '8',

            ],
        ];

         foreach ($products as $key => $value) {
            Product::create($value);
        }
    }
}
