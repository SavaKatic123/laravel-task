<?php

use Illuminate\Database\Seeder;
use App\Merchant;

class MerchantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Merchant::create(
            array(
                'merchant_name' => 'Seltrade',
                'country_id' => 1
            )
        );
        Merchant::create(
            array(
                'merchant_name' => 'Salesbox',
                'country_id' => 2
            )
        );
        Merchant::create(
            array(
                'merchant_name' => 'Pricity',
                'country_id' => 3
            )
        );
        Merchant::create(
            array(
                'merchant_name' => 'Revendor',
                'country_id' => 4
            )
        );
    }
}
