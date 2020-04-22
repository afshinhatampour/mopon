<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Coupon;
use Faker\Generator as Faker;

$factory->define(Coupon::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'link' => $faker->sentence,
        'amount' => $faker->numberBetween(0, 50),
        'brand_id' => $faker->numberBetween(1,20),
        'code' => $faker->numerify('#####'),
        'type' => $faker->name,
    ];
});
