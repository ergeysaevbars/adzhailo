<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
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
    $email = $faker->unique()->safeEmail;
    return [
        'surname' => $faker->lastName,
        'name' => $faker->firstName('male'),
        'patronymic' => $faker->middleName('male'),
        'email' => $email,
        'created_at' => now(),
        'updated_at' => now(),
        'password' => Hash::make($email), // password
        'company_id' => $faker->numberBetween(1, 50)
    ];
});
