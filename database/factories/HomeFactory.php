<?php

use Faker\Generator as Faker;

$factory->define(App\Models\HomeModel::class, function (Faker $faker) {
    return [
        'judul' => $faker->name,
        'content' => $faker->content,
    ];
});
