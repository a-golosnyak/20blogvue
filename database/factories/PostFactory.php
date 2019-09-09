<?php

use App\Models\Post;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id'      => '1',
        'title' => $faker->text(30),
        'body' => $faker->realText(),
    ];
});
