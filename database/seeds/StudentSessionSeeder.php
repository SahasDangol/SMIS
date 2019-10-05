<?php

use Illuminate\Database\Seeder;
use Modules\Student\Entities\StudentSession;

class StudentSessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(StudentSession::class,5)->create();
    }
}
