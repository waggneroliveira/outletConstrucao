<?php

use App\Category;
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
        $this->call([
            IntegrationSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            SubcategorySeeder::class,
            ProductSeeder::class
        ]);
    }
}
