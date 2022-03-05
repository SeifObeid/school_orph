<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
     /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         $employees = [
            [
                'name' => 'عبدو حسن',
                'phone_number' => '059999999',
                'photo' => null,

            ],
            [
                'name' => 'محمد اسماعيل',
                'phone_number' => '0598888888',
                'photo' => null,
            ],

        ];

         foreach ($employees as $key => $value) {
            Employee::create($value);
        }
    }
}
