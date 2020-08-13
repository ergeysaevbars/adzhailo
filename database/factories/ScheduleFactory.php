<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Company;
use App\Models\Schedule;
use App\Models\Shift;
use App\User;
use Faker\Generator as Faker;

$factory->define(Schedule::class, function (Faker $faker) {
    $date = $faker->date('2020-m-d', '2020-12-31');
    $user = User::inRandomOrder()->first();
    $shift = Shift::inRandomOrder()->first()->id;
//    echo $user->id . ' ' . $user->company_id . ' ' . $shift . ' ' . $date;
    $schedule = Schedule::where('company_id', $user->company_id)->where('date', $date)->where('shift_id', $shift)->first();
//    $schedule = Schedule::where('company_id', 2)->where('date', '2020-08-20')->where('shift_id', 1)->first();
    if (!$schedule)
        return [
            'project_name' => $faker->jobTitle,
            'price' => $faker->numberBetween(100, 1000000),
            'type' => $faker->colorName,
            'company_id' => $user->company_id,
            'user_id' => $user->id,
            'date' => $date,
            'shift_id' => $shift,
        ];
});
