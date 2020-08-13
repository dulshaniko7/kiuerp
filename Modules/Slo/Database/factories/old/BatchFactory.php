<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Modules\Academic\Entities\Course;
use Faker\Generator as Faker;
use Modules\Slo\Entities\BatchType;

$factory->define(\Modules\Slo\Entities\Batch::class, function (Faker $faker) {
    return [
        'batch_name' => $faker->word,
        'max_student' => 100,
        'batch_code' => $faker->numberBetween(100, 1000),
        'batch_start_date' => $faker->dateTimeBetween('now', '1 year'),
        'batch_end_date' => $faker->dateTimeBetween('2 years', '6 years'),
        'approved' => 0,
        'course_id' => function () {
            return Course::all()->random();
        },
        'batch_type' => function () {
            return BatchType::all()->random();
        }
    ];
});
