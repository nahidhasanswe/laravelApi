<?php

use Faker\Generator as Faker;
use Ramsey\Uuid\Uuid;

$factory->define(App\Model\Product::class, function (Faker $faker) {
    return [
        'id' => Uuid:: uuid4(),
        'name' => $faker->word,
        'detail'=> $faker->paragraph,
        'price' => $faker->numberBetween(100,1000),
        'stock' => $faker->randomDigit,
        'discount'=> $faker->numberBetween(2,30),
    ];
});
