<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Entities\Item;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'item_category_id' => $faker->numberBetween(1,5),
        'name' => $faker->colorName,
        'price' => 5000,
        'stock' => 10,
        'image' => 'image/sabun.jpg',
    ];
});
