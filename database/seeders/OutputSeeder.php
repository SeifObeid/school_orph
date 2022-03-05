<?php

namespace Database\Seeders;

use App\Models\Output;
use Illuminate\Database\Seeder;

class OutputSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          //
         $outputs = [
            [
                'note' => 'we are in 1',
                'order_id' => '5001',
                'date' => '2021-05-11',

                'user_id' => '3',
                'main_category_id' => '8',
                'employee_id' => '1',

            ],
            [
                'note' => 'we are in 2',
                'order_id' => '5002',
                'date' => '2021-05-12',

                'user_id' => '3',
                'main_category_id' => '8',
                'employee_id' => '1',
            ],
            [
                'note' => 'we are in 3',
                'order_id' => '5003',
                'date' => '2021-05-13',

                'user_id' => '3',
                'main_category_id' => '8',
                'employee_id' => '1',

            ],
        ];

         foreach ($outputs as $key => $value) {
            Output::create($value);
        }
    }
}
