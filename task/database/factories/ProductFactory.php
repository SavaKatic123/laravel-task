<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Product;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Product::class, function (Faker $faker) {
    return [
        'merchant_id' => 1,
        'name' => $faker->name,
        'description' => Str::random(10),
        'price' => rand(1, 1000),
        'status' => $faker->randomElement(['in_stock', 'out_of_stock']),
    ];
});
