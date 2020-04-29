<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

use App\Product;
use App\Category;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' => Category::all()->random()->id,
        'title' => $faker->text(25),
        'description' => $faker->text(25),
        'price' => random_int(100, 1000),
        'sale_price' => random_int(0, 1000),
    ];
});
