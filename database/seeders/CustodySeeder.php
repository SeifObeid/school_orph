<?php

namespace Database\Seeders;

use App\Models\Custody;
use Illuminate\Database\Seeder;

class CustodySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
          $custodies = [
            [
                'end_date' => '2021-05-11',

                'note' => null,
                'start_date' => '2021-05-25',

                'product_output_id' => '3',
                'employee_id' => '1',



            ],
            [

                'start_date' => '2021-05-28',
                'note' => null,
                'end_date' => null,

                'product_output_id' => '3',
                'employee_id' => '2',
            ],

        ];

         foreach ($custodies as $key => $value) {
            Custody::create($value);
        }
    }
}
