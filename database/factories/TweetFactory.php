<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Tweet;
use Faker\Generator as Faker;

$factory->define(Tweet::class, function (Faker $faker) {
    return [

'user_id' => factory(User::class),
'body' => $faker->sentence ,

    ];
});
