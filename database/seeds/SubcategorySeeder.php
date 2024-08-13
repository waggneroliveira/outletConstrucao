<?php

use App\Subcategory;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subcategory::create([
            'category_id' => 1,
            'title' => '0',
            'deleted_at' => date('Y-m-d H:i:s'),
            'active' => '0',
        ]);
    }
}
