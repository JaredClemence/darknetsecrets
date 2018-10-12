<?php

use Faker\Generator as Faker;
use App\Campaign\Promotion;

$factory->define(Promotion::class, function (Faker $faker) {
    return [
        'code'=>md5( $faker->paragraph ),
        'name'=>$faker->company
    ];
});
