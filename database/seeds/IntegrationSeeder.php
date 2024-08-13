<?php

use App\Integration;
use Illuminate\Database\Seeder;

class IntegrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Integration::create([
            'min_price_freight_free' => 500.00,
            'max_installment_nointerest' => 5,
            'email_pagseguro' => '',
            'token_pagseguro' => ''
        ]);
    }
}
