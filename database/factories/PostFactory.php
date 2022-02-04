<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker -> word(),
        'subtitle' => $faker -> sentence(),
        'author' => $faker -> name(),
        'date' => $faker -> date(),
        'description' => $faker -> paragraph()
    ];
});
