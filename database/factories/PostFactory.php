<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
       'title' => $faker->text(70),
       'text' => $faker->text(500),
       'slug' => $faker->slug(4)
    ];
});
