<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            array(
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin'),
                'name' => 'Admin'
            )
        );

        User::create(
            array(
                'email' => 'admin2@admin.com',
                'password' => Hash::make('admin'),
                'name' => 'Admin2'
            )
        );

        User::create(
            array(
                'email' => 'admin3@admin.com',
                'password' => Hash::make('admin'),
                'name' => 'Admin3'
            )
        );

    }
}
