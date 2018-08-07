<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\Book::class, function (Faker $faker) {
    return [
        'category_id' => $faker->numberBetween(0, 5),
        'title' => $faker->name,
        'author' => $faker->name,
        'description' => 'Sach Framgia',
        'image' => $faker->imageUrl(124, 124, 'fashion', true, 'Faker', false),
    ];
});
