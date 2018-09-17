<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
     return [
        'name' => $faker->word,
        'hs_code' => $faker->word,
        'product_category_id' => 1,
        'product_pattern_id' => 1,
        'product_group_id' => 1,
        'product_brand_id' => 1,
        'model' => $faker->number,
        'serial' => $faker->number,
        'part_number' => $faker->number,
        'country_of_origin_country_id' => $faker->number,
        'country_of_manufacture_country_id' => $faker->number,
        'unit_of_measurement_id' => $faker->number,
        'product_status_id' => $faker->number,
        'tp_rate' => $faker->numberBetween(100, 200),
        'mrp_rate' => $faker->numberBetween(100, 200),
        'flat_rate' => $faker->numberBetween(100, 200),
        'special_rate' => $faker->numberBetween(100, 200),
        'distribution_rate' => $faker->numberBetween(100, 200),
        'other' => $faker->word,
        'pack_size' => $faker->numberBetween(100, 200),
        'shipper_carton_size' => $faker->numberBetween(100, 200),
        'description' => $faker->paragraph,
        'creator_user_id' => $faker->number,
    ];
});
