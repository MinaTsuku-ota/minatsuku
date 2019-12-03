<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

// use App\Model;
use Faker\Generator as Faker;
use Carbon\Carbon;

//  Model::class になっていたところを App\Article::class に変更
$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'body' => $faker->paragraph(),
        'published_at' => Carbon::today(),
        // usersテーブルからidをとってくる
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
    ];
});
