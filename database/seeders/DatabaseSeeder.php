<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Only seed hospitals and fundraisers - remove all other dummy data
        $this->call([
            AdminSeeder::class,
            HospitalSeeder::class,
            FundraiserUserSeeder::class,  // Create dummy users for fundraisers first
            FundraiserSeeder::class,
        ]);
    }
}
