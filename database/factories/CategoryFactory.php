<?php

use Faker\Generator as Faker;
use appbrus\Category;

$factory->define(Category::class, function (Faker $faker) {
	return [
		'name'=>ucfirst($faker->word),
		'description'=>$faker->sentence(10)
	];
});
