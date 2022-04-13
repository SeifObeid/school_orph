<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(CreateUsersSeeder::class);
        $this->call(MainCategorySeeder::class);
        $this->call(SubCategorySeeder::class);
        $this->call(SupplierSeeder::class);

        $this->call(ProductSeeder::class);

        $this->call(EntrySeeder::class);

        $this->call(ProductEntrySeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(OutputSeeder::class);
        $this->call(ProductOutputSeeder::class);
        $this->call(CustodySeeder::class);

    }
}
