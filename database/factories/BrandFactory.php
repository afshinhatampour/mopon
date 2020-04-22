<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Brand;
use Faker\Generator as Faker;

$factory->define(Brand::class, function (Faker $faker) {
    $name = $faker->name;
    return [
        'name' => $name,
        'description' => $faker->paragraph,
        'category_id' => $faker->numberBetween(1,10),
        'website' => 'www.' . $name . '.com'
    ];
});
