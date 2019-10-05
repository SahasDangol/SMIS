<?php

use Illuminate\Database\Seeder;
use Modules\Student\Entities\Student;
use Modules\Student\Entities\StudentSession;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Student::class,80)->create();
//        factory(Student::class,5)
//            ->create()
//            ->each(function ($u) {
//                $u->student_session()->save(factory(StudentSession::class)->make());
//            })
        ;
    }
}
