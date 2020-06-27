<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use App\Models\PostImage;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(3),
        'body' => $faker->realText(rand(80, 600)),
        'author_id' => function () {
            return User::inRandomOrder()->first()->id;
        }
    ];
});
$factory->define(PostImage::class, function (Faker $faker) {
    return [
        'name' => 'default.jpg',
    ];
});
