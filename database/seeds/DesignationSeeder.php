<?php

use Illuminate\Database\Seeder;
use Modules\Others\Entities\Designation;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Designation::insert([
            ['name'=>'Principal'],
            ['name'=>'Teacher'],
            ['name'=>'Accountant'],
            ['name'=>'Receptionist'],
            ['name'=>'Lab Incharge'],
            ['name'=>'Sports Teacher'],
            ['name'=>'Peon'],
            ['name'=>'Gardener'],
            ['name'=>'Driver'],
            ['name'=>'Admin'],
]);
    }
}
