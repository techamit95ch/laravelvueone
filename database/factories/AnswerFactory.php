<?php

/** @var Factory $factory */

use App\Answer;
use App\Model;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Answer::class, function (Faker $faker) {
    return [
        'body' => $faker->paragraph(rand(3, 7), true),
        'user_id' => User::pluck('id')->random(),
        'votes_count' => rand(0, 5),
        //
    ];
});
