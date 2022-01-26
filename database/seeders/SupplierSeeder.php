<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         $supplier = [
            [
                'name' => 'Leen',
                'phone_number' => '0588888888',

            ],
            [
                'name' => 'Usersss',
                'phone_number' => '0588877777',

            ],
            [
                'name' => 'Seifooo',
                'phone_number' => '05888555555',

            ],
        ];

         foreach ($supplier as $key => $value) {
            Supplier::create($value);
        }

    }
}
