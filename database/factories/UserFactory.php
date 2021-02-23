<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Purchase;
use App\Models\Vendor;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Vendor::class, function (Faker $faker) {
    return [
        'company' => $faker->company,
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone_number' => $faker->unique()->phoneNumber,
        'notes' => $faker->unique()->sentence,
    ];
});

$factory->define(Purchase::class, function (Faker $faker) {
    return [
        'vendor_id' => rand(1,15),
        'product_id' => rand(1,3),
        'quantity' => rand(25,100),
        'amount' => rand(250,1000),
        'unit_price' => rand(8,10),
        'payed_by' =>$faker->randomElement(['cash', 'Account']),
        'purchase_receipt' => 'INV-'.$faker-> numerify('###-###-####'),
        'notes' => $faker->unique()->sentence,
        'created_at' => $faker->dateTimeBetween('-1 years', 'now'),
    ];
});
