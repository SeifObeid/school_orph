<?php

namespace Database\Seeders;

use App\Models\Entry;
use Illuminate\Database\Seeder;

class EntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         $entries = [
            [
                'note' => 'we are in ',
                'invoice_number' => '5001',
                'date' => '2020-10-10',
                'entry_insurance' => '1',
                'supplier_id' => '1',
                'user_id' => '3',
                'main_category_id' => '8',
            ],
            [
                'note' => 'we are in ',
                'invoice_number' => '5002',
                'date' => '2020-10-10',
                'entry_insurance' => '0',
                'supplier_id' => '2',
                'user_id' => '3',
                'main_category_id' => '8',
            ],
            [
                'note' => 'we are in ',
                'invoice_number' => '5003',
                'date' => '2020-10-10',
                'entry_insurance' => '1',
                'supplier_id' => '3',
                'user_id' => '3',
                'main_category_id' => '8',

            ],
        ];

         foreach ($entries as $key => $value) {
            Entry::create($value);
        }
    }
}
