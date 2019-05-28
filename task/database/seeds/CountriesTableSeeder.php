<?php

use Illuminate\Database\Seeder;
use App\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::create(
            array(
                'name' => 'Bahamas',
                'code' => 'BS',
                'continent_name' => 'North America'
            )
        );

        Country::create(
            array(
                'name' => 'Serbia',
                'code' => 'SRB',
                'continent_name' => 'Europe'
            )
        );

        Country::create(
            array(
                'name' => 'Malta',
                'code' => 'MLT',
                'continent_name' => 'Europe'
            )
        );

        Country::create(
            array(
                'name' => 'Malaysia',
                'code' => 'MYS',
                'continent_name' => 'Asia'
            )
        );
    }
}
