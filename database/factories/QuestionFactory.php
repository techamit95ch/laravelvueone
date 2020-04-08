<?php

/** @var Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(App\Question::class, function (Faker $faker) {
    return [
        //
        'title' => rtrim($faker->sentence(rand(5, 10)), "."),
        'body' => rtrim($faker->paragraphs(rand(3, 7), true), "."),
        'views' => rand(0, 10),
        'answers_count' => rand(0, 10),
        'votes' => rand(-3, 10),
    ];
});

