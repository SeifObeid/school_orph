<?php

namespace Database\Seeders;

use App\Models\ProductOutput;
use Illuminate\Database\Seeder;

class ProductOutputSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
          //
         $productOutputs = [
            [
                'quantity' => 2,
                'output_id' => 1,
                'product_id' => '1',

            ],
            [


                'quantity' => 1,
                'output_id' => 2,
                'product_id' => '1',

            ],
            [
                'quantity' => 1,
                'output_id' => 3,
                'product_id' => '4',
                'destroyed'=> false,
                'destroyed_date'=>  '',
                'custody_id'=> 'K-12',

            ],
        ];

         foreach ($productOutputs as $key => $value) {
            ProductOutput::create($value);
        }
    }
}
