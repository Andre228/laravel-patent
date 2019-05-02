<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(\App\Models\Post::class, function (Faker $faker) {

    $createdat = $faker->dateTimeBetween('-5 years', '-3 months');
    $title = $faker->sentence(rand(1,11),true);
    $text = $faker->realText(rand(500,1000));
    $ispublished = rand(1,10) > 1;

    //$updated_at = $faker->dateTimeBetween('-3 months', '-3 days');
    return [

        'category_id' => rand(1,11),
        'user_id' => (rand(1,10) == 10) ? 1 : 2,
        'title' => $title,
        'slug' => Str::slug($title),
        'excerpt' => $faker->text(rand(30,90)),
        'content_raw' => $text,
        'content_html' => $text,
        'is_published' => $ispublished,
        'published_at' => $ispublished ? $faker->dateTimeBetween('-3 months', '-3 months') : null,
        'created_at' => $createdat,
        'updated_at' => $createdat,

    ];
});
