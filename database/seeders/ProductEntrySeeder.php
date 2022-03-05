<?php

namespace Database\Seeders;

use App\Models\ProductEntry;
use Illuminate\Database\Seeder;

class ProductEntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

         $productEntries = [
            [
                'quantity' => 3,
                'price' => 55.5,
                'product_id' => '1',
                'entry_id' => '1',



            ],
            [
                'quantity' => 5,
                'price' => 77.7,
                'product_id' => '1',
                'entry_id' => '2',
            ],
            [
                'quantity' => 1,
                'price' => 1500,
                'product_id' => '4',
                'entry_id' => '2',
            ],

        ];

         foreach ($productEntries as $key => $value) {
            ProductEntry::create($value);
        }
    }
}
