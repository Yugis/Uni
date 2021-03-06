<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
// $factory->define(App\User::class, function (Faker\Generator $faker) {
//     static $password;
//
//     return [
//         'name' => $faker->name,
//         'email' => $faker->unique()->safeEmail,
//         'password' => $password ?: $password = bcrypt('secret'),
//         'remember_token' => str_random(10),
//     ];
// });

$factory->define(App\Question::class, function (Faker\Generator $faker) {

    $answer = $faker->word;

    return [
        'title' => $faker->sentence($nbWords = 6),
        'option_1' => $answer,
        'option_2' => $faker->word,
        'option_3' => $faker->word,
        'option_4' => $faker->word,
        'correct_answer' => $answer,
        'course_id' => 39,
    ];
    /*
     *    When you want to call it with a different course id, do this
     *    in tinker:
     *    factory(App\Question::class, 10)->create(['course_id' => 39]);
     *
     */

});
