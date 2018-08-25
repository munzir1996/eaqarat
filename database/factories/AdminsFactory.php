<?php

use Faker\Generator as Faker;

$factory->define(App\Admin::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt('123456')
    ];
});
