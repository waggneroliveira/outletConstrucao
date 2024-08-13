<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Developer',
            'email' => 'developer@hoom.com.br',
            'password' => Hash::make('@Hoomdeveloper'),
            'super_admin' => '01',
            'active' => '0',
        ]);
    }
}
