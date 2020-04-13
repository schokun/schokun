<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;

$factory->define(\App\Models\Comment::class, function (Faker $faker) {
    return [
        'text' => $faker->text(50),
        'user_id' => rand(1 , 10),
        'slug' => $faker->slug(4)
    ];
});
