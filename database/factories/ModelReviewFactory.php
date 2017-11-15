<?php

use Faker\Generator as Faker;
use Ramsey\Uuid\Uuid;
use App\Model\Product;

$factory->define(App\Model\Review::class, function (Faker $faker) {
    return [
        'id' => Uuid:: uuid4(),
        'customer' => $faker->name,
        'review'=> $faker->paragraph,
        'star' => $faker->numberBetween(0,5),
        'product_id' => function() {
        	return Product::all()->random();
        }
    ];
});
