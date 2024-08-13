<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'title' => '0',
            'deleted_at' => date('Y-m-d H:i:s'),
            'active' => '0',
        ]);
    }
}
