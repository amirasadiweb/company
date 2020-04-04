<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Employe::class, function (Faker $faker) {
    return [
        'company_id'=>factory(\App\Company::class)->create()->id,
        'firstname' => $faker->name,
        'lastName' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->creditCardNumber,

    ];
});
