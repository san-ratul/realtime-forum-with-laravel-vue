<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use App\User;
use App\Category;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    $title = $faker->sentence;
    $slug = str_slug($title, '-');
    return [
        'title' => $title,
        'slug' => $slug,
        'body' => $faker->text,
        'user_id' => function (){
            return User::all()->random();
        },
        'category_id' => function (){
            return Category::all()->random();
        },
    ];
});
