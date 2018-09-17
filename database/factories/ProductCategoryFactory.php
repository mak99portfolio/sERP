<?php

use Faker\Generator as Faker;
use App\User;

$factory->define(App\ProductCategory::class, function (Faker $faker) {
        return [
        'name' => $faker->word,
        'short_name' => $faker->word,
        'product_category_id' => 1,
        'creator_user_id' => function(){
            return User::all()->random();
        }
    ];
});
