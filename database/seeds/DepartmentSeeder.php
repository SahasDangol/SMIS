<?php

use Illuminate\Database\Seeder;
use Modules\Others\Entities\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::insert([
            ['name'=>'Academics'],
            ['name'=>'Account'],
            ['name'=>'Exam'],
            ['name'=>'Sports'],
            ['name'=>'Library'],
            ]);
    }
}
