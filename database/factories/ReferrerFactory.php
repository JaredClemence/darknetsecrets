<?php

use Faker\Generator as Faker;
use App\Campaign\Referrer;
use App\Campaign\Promotion;

$factory->define(Referrer::class, function (Faker $faker) {
    return [
        'promotion_id'=>function(){ return factory(Promotion::class)->create()->id; },
        'email'=>$faker->email,
        'verified'=>$faker->boolean,
        'secure_token'=>md5( $faker->paragraph )
    ];
});
