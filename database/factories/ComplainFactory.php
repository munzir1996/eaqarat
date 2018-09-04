<?php

use Faker\Generator as Faker;

$factory->define(App\Complain::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'complain' => $faker->paragraph,
    ];
});
