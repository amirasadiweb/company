<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Company::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'email' => $faker->unique()->safeEmail,
        'logo'=>'storage/app/public/non-image.jpg',
        'website'=>$faker->safeEmailDomain


    ];
});
