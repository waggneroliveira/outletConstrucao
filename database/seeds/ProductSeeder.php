<?php

use App\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'id' => 0,
            'category_id' => 1,
            'subcategory_id' => 1,
            'title' => '0',
            'amount' => '0.00',
            'slug' => '0',
            'deleted_at' => date('Y-m-d H:i:s'),
            'active' => '0',
        ]);
    }
}
