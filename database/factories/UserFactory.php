<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\File;
use Modules\Staff\Entities\Staff;
use Modules\Student\Entities\Student;
use Modules\Student\Entities\StudentSession;

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
/*
$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});*/

$factory->define(Student::class, function (Faker $faker) {
    $filePath = storage_path('..\public\storage\images');
    if (!File::exists($filePath)) {
        File::makeDirectory($filePath);  //follow the declaration to see the complete signature
    }
for ($i=1;$i<=520;$i++) {
    $class = 1;
    $section = 1;
    if ($i % 40 == 0) {
        $class = $class + 1;
    }
    return [


        'section_id' => $section,
        'classroom_id' => $class,
        'user_id' => 1,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,

        'dob' => '02/03/1997',
        'gender' => 'Male',
        'previous_school_name' => 'MVA',
        'permanent_address' => $faker->address,
        'nationality' => 'Nepali',
        'religion' => $faker->randomElement(['hindu', 'islam', 'buddhist', 'christian', 'others']),
        'personal_photo' => $faker->image($filePath, 400, 300),
        'blood_group' => 'A+',

        'father_first_name' => $faker->firstName,
        'father_last_name' => $faker->lastName,

        'father_mobile' => $faker->numberBetween($min = 1000000000, $max = 2000000000),


        'mother_first_name' => $faker->firstName,
        'mother_last_name' => $faker->lastName,

        'mother_mobile' => $faker->numberBetween($min = 2000000000, $max = 3000000000),


        'previous_class' => $faker->randomElement(['1', '2']),
        'grade' => $faker->randomElement(['1', '2', '3', '4']),
        'guardian_first_name' => $faker->firstName,
        'guardian_last_name' => $faker->lastName,
        'guardian_relation' => 'father',
        'guardian_email' => $faker->email,
        'guardian_mobile' => $faker->numberBetween($min = 3000000000, $max = 4000000000),
        'guardian_permanent_address' => $faker->address,
        'admission_id' => $faker->numberBetween($min = 10000, $max = 999999),
        'roll_no' => $faker->unique()->numberBetween(100, 1000000),
        'comments' => 'Good Progress',


    ];

}
}
);

//$factory->define(StudentSession::class, function (Faker $faker) {
//    return [
//
//            'session_id' => get_academic_year(),
//            'student_id' =>function () {
//                return factory(Student::class)->create()->id;
//
//        },
//            'classroom_id' =>
//                function () {
//                    return factory(Student::class)->create()->classroom_id;
//
//                },
//            'section_id' => function () {
//                return factory(Student::class)->create()->section_id;
//
//            },
//            'roll' =>function () {
//                return factory(Student::class)->create()->roll_no;
//
//            },
//
//
//    ];
//}
//
//);


$factory->define(Staff::class, function (Faker $faker) {

    return [
        'user_id' => 1,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,

        'dob' => '02/03/1997',
        'gender' => 'Male',

        'permanent_address' => $faker->address,
        'nationality' => 'Nepali',
        'citizenship_no' => $faker->numberBetween(12312313, 123133132133),
        'mobile' => $faker->numberBetween($min = 6000000000, $max = 7000000000),

        'email' => $faker->email,
        'marital_status' => $faker->randomElement(['single', 'married']),
        'blood_group' => 'A+',

        'father_first_name' => $faker->firstName,
        'father_last_name' => $faker->lastName,

        'father_mobile' => $faker->numberBetween($min = 7000000000, $max = 8000000000),


        'mother_first_name' => $faker->firstName,
        'mother_last_name' => $faker->lastName,

        'mother_mobile' => $faker->numberBetween($min = 8000000000, $max = 9000000000),
        'joining_date' => '04/07/2019',
        'staff_id' => $faker->numberBetween($min = 10000, $max = 1000000),

        'designation_id' => $faker->randomElement(['1', '2']),
        'department_id' => $faker->randomElement(['1', '2', '3', '4']),
        'higher_education_degree' => 'Bachelors Degree',
        'grade' => $faker->randomElement(['1', '2', '3', '4']),
        'institution' => 'Khwopa Engineering College',
        'institution_address' => $faker->address,

        'comments' => 'Looking Forward To You',

    ];


}

);

