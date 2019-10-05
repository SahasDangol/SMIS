<?php

use Illuminate\Database\Seeder;
use Modules\Classroom\Entities\Classroom;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Classroom::insert([
            ['class_name'=>'Nursery'],
            ['class_name'=>'LKG'],
            ['class_name'=>'UKG'],
            ['class_name'=>'One'],
            ['class_name'=>'Two'],
            ['class_name'=>'Three'],
            ['class_name'=>'Four'],
            ['class_name'=>'Five'],
            ['class_name'=>'Six'],
            ['class_name'=>'Seven'],
            ['class_name'=>'Eight'],
            ['class_name'=>'Nine'],
            ['class_name'=>'Ten'],

        ]);
    }
}
