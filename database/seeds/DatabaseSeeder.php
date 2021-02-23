<?php

use App\Models\Purchase;
use App\Models\Vendor;
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
         $this->call(UserSeeder::class);

        //seeding using factory
        factory(Vendor::class,25)->create();
        factory(Purchase::class,250)->create();
    }
}
