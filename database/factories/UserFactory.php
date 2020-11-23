<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Blog;
use App\Category;
use App\Photo;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'role_id'=> rand(1,3),
        'photo_id' => rand(1,4),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Photo::class, function (Faker $faker) {
    return [
        'file' =>$image = '400x400.png',
        'title' => $image,

    ];
});

$factory->define(Blog::class, function (Faker $faker) {
    return [
        'title' =>$title = $faker->unique()->name,
        'user_id' => 1,
        'body' => $faker->paragraph(rand(15,50)),
        'meta_title' => $title,
        'meta_desc' =>$faker->paragraph(),
        'status' => rand(0,1),
        'slug' => Str::slug($title),
        'photo_id' => rand(1,6),
    ];
});

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' =>$name = $faker->name,
        'slug' => Str::slug($name),

    ];
});


